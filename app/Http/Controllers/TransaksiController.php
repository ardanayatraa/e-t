<?php
// app/Http/Controllers/TransaksiController.php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::with('paketWisata','pelanggan','pemesanan')->get();
        return view('transaksi.index', compact('data'));
    }

    public function create()
    {
        $pakets    = PaketWisata::all();
        $pelanggan = Pelanggan::all();
        $pesanan   = Pemesanan::all();
        return view('transaksi.create', compact('pakets','pelanggan','pesanan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'peketwisata_id'   => 'required|exists:paket_wisatas,paketwisata_id',
            'pemesan_id'       => 'required|exists:pelanggans,pelanggan_id',
            'pemesanan_id'     => 'required|exists:pemesanan,pamesanan_id',
            'jenis_transakasi' => 'required|string',
            'jumlah_peserta'   => 'required|integer',
            'owe_to_me'        => 'required|numeric',
            'pay_to_provider'  => 'required|numeric',
            'total_transaksai' => 'required|numeric',
            'transaksi_status' => 'required|string',
        ]);

        Transaksi::create($data);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi created.');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pakets    = PaketWisata::all();
        $pelanggan = Pelanggan::all();
        $pesanan   = Pemesanan::all();
        return view('transaksi.edit', compact('transaksi','pakets','pelanggan','pesanan'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $data = $request->validate([
            'jenis_transakasi' => 'required|string',
            'jumlah_peserta'   => 'required|integer',
            'owe_to_me'        => 'required|numeric',
            'pay_to_provider'  => 'required|numeric',
            'total_transaksai' => 'required|numeric',
            'transaksi_status' => 'required|string',
        ]);

        $transaksi->update($data);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted.');
    }

    // contoh method untuk generate & kirim e-ticket
    public function ticket(Transaksi $transaksi)
    {
        // generate PDF & kirim ke email...
    }
}
