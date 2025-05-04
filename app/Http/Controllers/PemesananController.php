<?php
// app/Http/Controllers/PemesananController.php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pesanan = Pemesanan::with('pelanggan','paketWisata')->get();
        return view('pemesanan.index', compact('pesanan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $pakets    = PaketWisata::all();
        return view('pemesanan.create', compact('pelanggan','pakets'));
    }

    public function store(Request $request)
    {


        // validasi input
        $data = $request->validate([
            'paket_id'         => 'required|integer|exists:paket_wisatas,paketwisata_id',
        'tanggal' => 'required|date_format:Y-m-d',

            'mobil_id'         => 'required|integer|exists:mobils,mobil_id',
            'harga'            => 'required|numeric',
            'jumlah_peserta'   => 'required|integer|min:1',
            'nama_pemesan'     => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'alamat'           => 'required|string|max:500',
            'nomor_whatsapp'   => 'required|string|max:20',
            'jam_mulai'   => 'required|string|max:20',
        ]);

        // 1) Cek/membuat Pelanggan
        $pelanggan = Pelanggan::firstOrCreate(
            ['email' => $data['email']],
            [
                'nama_pemesan'   => $data['nama_pemesan'],
                'alamat'         => $data['alamat'],
                'nomor_whatsaap' => $data['nomor_whatsapp'],
            ]
        );

        // 2) Buat Pemesanan
        $pemesanan = Pemesanan::create([
            'pemesan_id'             => $pelanggan->pelanggan_id,
            'paketwisata_id'         => $data['paket_id'],
            'mobil_id'               => $data['mobil_id'],
            'tanggal_keberangkatan'  => $data['tanggal'],
            'jam_mulai'              =>  $data['jam_mulai'],
        ]);



        // 3) Buat Transaksi
        Transaksi::create([
            'paketwisata_id'    => $data['paket_id'],
            'pemesan_id'        => $pelanggan->pelanggan_id,
            'pemesanan_id'      => $pemesanan->pemesanan_id,
            'jenis_transaksi'   => '',
            'deposit'           => 0,
            'balance'           => 0,
            'jumlah_peserta'    => $data['jumlah_peserta'],
            'owe_to_me'         => 0,              // belum ada kewajiban sopir
            'pay_to_provider'   => 0,              // input nanti saat konfirmasi
            'total_transaksi'   =>$data['harga'],
            'transaksi_status'  => 'pending',
        ]);




        // 4) Redirect dengan pesan sukses
        return redirect()
            ->route('paket-wisata.landing')
            ->with('success', 'Pemesanan dan Transaksi berhasil dibuat.');
    }

    public function show(Pemesanan $pemesanan)
    {
        return view('pemesanan.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan)
    {
        $pelanggan = Pelanggan::all();
        $pakets    = PaketWisata::all();
        return view('pemesanan.edit', compact('pemesanan','pelanggan','pakets'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $data = $request->validate([
            'pemesan_id'            => 'required|exists:pelanggans,pelanggan_id',
            'paketwisata_id'        => 'required|exists:paket_wisatas,paketwisata_id',
            'mobil_id'          => 'required',
            'jam_mulai'             => 'required|date_format:H:i',
            'tanggal_keberangkatan' => 'required|date',
        ]);

        $pemesanan->update($data);
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan updated.');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan deleted.');
    }
}
