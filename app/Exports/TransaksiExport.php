<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class TransaksiExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $selectedIds;

    public function __construct($selectedIds = [])
    {
        $this->selectedIds = array_map('intval', $selectedIds);
    }

    public function collection()
    {
        return empty($this->selectedIds)
            ? collect()
            : Transaksi::with(['pemesanan.mobil.sopir', 'pelanggan', 'paketWisata'])
                ->whereIn('transaksi_id', $this->selectedIds)
                ->orderBy('created_at', 'desc')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Receipt No.',
            'Booking Date',
            'Tour Date',
            'Name',
            'Pax',
            'Accommodation',
            'Driver',
            'Tour',
            'Total Amount',
            'Additional Charge',  // new column
            'Deposit',
            'Balance',
            'Payment Type',
            'Provider to Paid',
            'Remark',
            'Owes to Agent',
            'Remark',
            'Commission',
        ];
    }

    public function map($t): array
    {
        // Ambil nilai-nilai
        $totalAmount       = $t->total_transaksi ?? 0;
        $additionalCharge  = $t->additional_charge ?? 0;
        $deposit           = $t->deposit ?? 0;
        // Hitung balance: total_transaksi (sudah mencakup harga paket + additional) - deposit
        $balanceKalkulasi  = max($totalAmount - $deposit, 0);

        return [
            $t->transaksi_id,
            optional($t->pemesanan)->created_at?->format('Y-m-d') ?? '',
            optional($t->pemesanan)->tanggal_keberangkatan ?? '',
            optional($t->pelanggan)->nama_pemesan ?? '-',
            $t->jumlah_peserta ?? 0,
            optional($t->pelanggan)->alamat ?? '-',
            optional($t->pemesanan?->mobil?->sopir)->nama_sopir ?? '-',
            optional($t->paketWisata)->judul ?? '-',
            $totalAmount,
            $additionalCharge,
            $deposit,
            $balanceKalkulasi,
            $t->jenis_transaksi ?? '-',
            $t->pay_to_provider ?? 0,
            $t->remark ?? '-',
            $t->owe_to_me ?? 0,
            $t->remark ?? '-',
            null, // Commission (diisi rumus Excel di AfterSheet)
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet      = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestDataRow();
                $totalRow   = $highestRow + 1;

                // 1. Isi rumus Komisi di kolom R:
                //    Komisi = Deposit (K) - ProviderPaid (N) + OwesToAgent (P)
                for ($row = 2; $row <= $highestRow; $row++) {
                    $sheet->setCellValue("R{$row}", "=IFERROR(K{$row}-N{$row}+P{$row},0)");
                }

                // 2. Baris TOTAL untuk beberapa kolom:
                //    Total Amount (I), Additional Charge (J), Deposit (K), Balance (L),
                //    Provider to Paid (N), Owes to Agent (P), Commission (R)
                $sheet->setCellValue("H{$totalRow}", 'TOTAL');
                $sheet->setCellValue("I{$totalRow}", "=SUM(I2:I{$highestRow})");
                $sheet->setCellValue("J{$totalRow}", "=SUM(J2:J{$highestRow})");
                $sheet->setCellValue("K{$totalRow}", "=SUM(K2:K{$highestRow})");
                $sheet->setCellValue("L{$totalRow}", "=SUM(L2:L{$highestRow})");
                $sheet->setCellValue("N{$totalRow}", "=SUM(N2:N{$highestRow})");
                $sheet->setCellValue("P{$totalRow}", "=SUM(P2:P{$highestRow})");
                $sheet->setCellValue("R{$totalRow}", "=SUM(R2:R{$highestRow})");

                $sheet->getStyle("H{$totalRow}:R{$totalRow}")->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
                    'borders' => [
                        'top' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // 3. Styling header (baris 1)
                $sheet->getStyle("A1:R1")->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical'   => Alignment::VERTICAL_CENTER,
                    ],
                    'fill' => [
                        'fillType'   => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FFFF00'],
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // 4. Format mata uang untuk kolom nominal:
                //    I (Total Amount), J (Additional), K (Deposit), L (Balance),
                //    N (Provider to Paid), P (Owes to Agent), R (Commission)
                $currencyCols = ['I', 'J', 'K', 'L', 'N', 'P', 'R'];
                foreach ($currencyCols as $col) {
                    $sheet->getStyle("{$col}2:{$col}{$totalRow}")
                          ->getNumberFormat()
                          ->setFormatCode('"Rp"#,##0');
                }

                // 5. Full border semua isi data (baris 2 s/d TOTAL)
                $sheet->getStyle("A2:R{$totalRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color'       => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
