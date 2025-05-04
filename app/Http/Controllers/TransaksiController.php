<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Mail\SendTicket;
use App\Models\Transaksi;
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\IncludeModel;
use App\Models\Exclude;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::with(['paketWisata', 'pelanggan', 'pemesanan'])->get();
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakets     = PaketWisata::all();
        $pelanggans = Pelanggan::all();
        $pesanan  = Pemesanan::all();

        return view('transaksi.create', compact('pakets', 'pelanggans', 'pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'paketwisata_id'   => 'required|exists:paketwisatas,paketwisata_id',
            'pemesan_id'       => 'required|exists:pelanggans,pelanggan_id',
            'pemesanan_id'     => 'required|exists:pemesanans,pemesanan_id',
            'jenis_transaksi'  => 'required|string|max:255',
            'deposit'          => 'required|numeric|min:0',
            'balance'          => 'required|numeric|min:0',
            'jumlah_peserta'   => 'required|integer|min:1',
            'owe_to_me'        => 'numeric|min:0',
            'pay_to_provider'  => 'numeric|min:0',
            'total_transaksi'  => 'required|numeric|min:0',
            'transaksi_status' => 'required|string|in:pending,paid,cancelled',
        ]);

        Transaksi::create($data);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $pakets     = PaketWisata::all();
        $pelanggans = Pelanggan::all();
        $pesanan  = Pemesanan::all();

        return view('transaksi.edit', compact('transaksi', 'pakets', 'pelanggans', 'pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $data = $request->validate([
            'jenis_transaksi'  => 'required|string|max:255',
            'deposit'          => 'required|numeric|min:0',
            'balance'          => 'required|numeric|min:0',
            'jumlah_peserta'   => 'required|integer|min:1',
            'owe_to_me'        => 'numeric|min:0',
            'pay_to_provider'  => 'numeric|min:0',
            'total_transaksi'  => 'required|numeric|min:0',
            'transaksi_status' => 'required|string|in:pending,paid,cancelled',
        ]);

        $transaksi->update($data);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }

    /**
     * Generate and send the e-ticket for a transaction.
     */
    public function ticket(Transaksi $transaksi)
    {
        abort(501, 'Metode ticket() belum diimplementasikan.');
    }


    public function confirmPayment(Request $request, Transaksi $transaksi)
    {
        // 1. Ambil langsung dari request
        $jenisPembayaran  = $request->input('jenis_pembayaran');
        $deposit          = $request->input('deposit', 0);
        $payToProvider    = $request->input('pay_to_provider', 0);
        $oweToMe          = $request->input('owe_to_me', 0);
        $include          = $request->input('include', []);
        $exclude          = $request->input('exclude', []);

        // 2. Update Transaksi
        $transaksi->update([
            'jenis_transaksi'  => $jenisPembayaran,
            'deposit'          => $deposit,
            'pay_to_provider'  => $payToProvider,
            'owe_to_me'        => $oweToMe,
            'transaksi_status' => 'paid',
        ]);

        // 3. Simpan IncludeModel
        IncludeModel::create([
            'pemesanan_id'        => $transaksi->pemesanan_id,
            'bensin'              => !empty($include['bensin']),
            'parkir'              => !empty($include['parkir']),
            'sopir'               => !empty($include['sopir']),
            'makan_siang'         => !empty($include['makan_siang']),
            'makan_malam'         => !empty($include['makan_malam']),
            'tiket_masuk'         => !empty($include['tiket_masuk']),
            'status_ketersediaan' => true,
        ]);

        // 4. Simpan Exclude
        Exclude::create([
            'pemesanan_id'        => $transaksi->pemesanan_id,
            'bensin'              => !empty($exclude['bensin']),
            'parkir'              => !empty($exclude['parkir']),
            'sopir'               => !empty($exclude['sopir']),
            'makan_siang'         => !empty($exclude['makan_siang']),
            'makan_malam'         => !empty($exclude['makan_malam']),
            'tiket_masuk'         => !empty($exclude['tiket_masuk']),
            'status_ketersediaan' => true,
        ]);

        Mail::to($transaksi->pelanggan->email)->send(new SendTicket($transaksi));

        // 5. Redirect dengan pesan
        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }


     /**
     * Tampilkan halaman laporan transaksi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
     // method laporan yang sudah ada...
     public function laporan(Request $request)
     {
         $transaksi = Transaksi::
                              orderBy('created_at', 'desc')
                                ->get();

         return view('transaksi.laporan', compact('transaksi'));
     }

     /**
      * Download data transaksi sebagai file Excel.
      */
     public function export()
     {
         return Excel::download(new TransaksiExport, 'laporan_transaksi_'.date('Ymd_His').'.xlsx');
     }

}
