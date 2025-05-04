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
            'Receipt No.', 'Booking Date', 'Tour Date', 'Name', 'Pax',
            'Accommodation', 'Driver', 'Tour', 'Total Amount', 'Deposit', 'Balance',
            'Payment Type', 'Provider to Paid', 'Remark', 'Owes to Agent', 'Remark', 'Commission',
        ];
    }

    public function map($t): array
    {
        return [
            $t->transaksi_id,
            optional($t->pemesanan)->created_at?->format('Y-m-d') ?? '',
            optional($t->pemesanan)->tanggal_keberangkatan ?? '',
            optional($t->pelanggan)->nama_pemesan ?? '-',
            $t->jumlah_peserta ?? 0,
            optional($t->paketWisata)->accommodation ?? '-',
            optional($t->pemesanan?->mobil?->sopir)->nama_sopir ?? '-',
            optional($t->paketWisata)->judul ?? '-',
            $t->total_transaksi ?? 0,
            $t->deposit ?? 0,
            $t->balance ?? 0,
            $t->jenis_transaksi ?? '-',
            $t->pay_to_provider ?? 0,
            $t->remark ?? '-',
            $t->owe_to_me ?? 0,
            $t->remark ?? '-',
            null, // Commission (formula)
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestDataRow();
                $totalRow = $highestRow + 1;

                // Isi formula di kolom Komisi (Q)
                for ($row = 2; $row <= $highestRow; $row++) {
                    $sheet->setCellValue("Q{$row}", "=IFERROR(J{$row}-M{$row}+O{$row},0)");
                }

                // Baris TOTAL
                $sheet->setCellValue("H{$totalRow}", 'TOTAL');
                $sheet->setCellValue("I{$totalRow}", "=SUM(I2:I{$highestRow})");
                $sheet->setCellValue("Q{$totalRow}", "=SUM(Q2:Q{$highestRow})");

                $sheet->getStyle("H{$totalRow}:Q{$totalRow}")->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
                    'borders' => [
                        'top' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Styling header (baris 1)
                $sheet->getStyle("A1:Q1")->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FFFF00'],
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Format mata uang untuk kolom nominal
                $currencyCols = ['I', 'J', 'K', 'M', 'O', 'Q'];
                foreach ($currencyCols as $col) {
                    $sheet->getStyle("{$col}2:{$col}{$totalRow}")
                        ->getNumberFormat()
                        ->setFormatCode('"Rp"#,##0');
                }

                // 🔲 Full border semua isi data (baris 2 s/d TOTAL)
                $sheet->getStyle("A2:Q{$totalRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
