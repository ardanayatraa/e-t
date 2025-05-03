<?php
// app/Http/Controllers/KetersediaanController.php

namespace App\Http\Controllers;

use App\Models\Ketersediaan;
use App\Models\Pemesanan;
use App\Models\Mobil;
use App\Models\Sopir;
use Illuminate\Http\Request;

class KetersediaanController extends Controller
{
    public function index()
    {
        $data = Ketersediaan::with('pemesanan','mobil','sopir')->get();
        return view('ketersediaan.index', compact('data'));
    }

    public function create()
    {
        $pesanan = Pemesanan::all();
        $mobils  = Mobil::all();
        $supirs  = Sopir::all();
        return view('ketersediaan.create', compact('pesanan','mobils','supirs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pemesanan_id'         => 'required|exists:pemesanan,pamesanan_id',
            'mobil_id'             => 'required|exists:mobils,tipemobil_id',
            'supir_id'             => 'required|exists:sopirs,sopir_id',
            'tanggal_keberangkatan'=> 'required|date',
            'status_ketersediaan'  => 'required|string',
        ]);

        Ketersediaan::create($data);
        return redirect()->route('ketersediaan.index')->with('success', 'Ketersediaan created.');
    }

    public function show(Ketersediaan $ketersediaan)
    {
        return view('ketersediaan.show', compact('ketersediaan'));
    }

    public function edit(Ketersediaan $ketersediaan)
    {
        $pesanan = Pemesanan::all();
        $mobils  = Mobil::all();
        $supirs  = Sopir::all();
        return view('ketersediaan.edit', compact('ketersediaan','pesanan','mobils','supirs'));
    }

    public function update(Request $request, Ketersediaan $ketersediaan)
    {
        $data = $request->validate([
            'status_ketersediaan' => 'required|string',
        ]);

        $ketersediaan->update($data);
        return redirect()->route('ketersediaan.index')->with('success', 'Ketersediaan updated.');
    }

    public function destroy(Ketersediaan $ketersediaan)
    {
        $ketersediaan->delete();
        return redirect()->route('ketersediaan.index')->with('success', 'Ketersediaan deleted.');
    }
}
