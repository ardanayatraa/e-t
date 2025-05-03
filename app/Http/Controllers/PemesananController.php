<?php
// app/Http/Controllers/PemesananController.php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
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
        $data = $request->validate([
            'pemesan_id'            => 'required|exists:pelanggans,pelanggan_id',
            'paketwisata_id'        => 'required|exists:paket_wisatas,paketwisata_id',
            'tipemobil_id'          => 'required',
            'jam_mulai'             => 'required|date_format:H:i',
            'tanggal_keberangkatan' => 'required|date',
        ]);

        Pemesanan::create($data);
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan created.');
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
            'tipemobil_id'          => 'required',
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
