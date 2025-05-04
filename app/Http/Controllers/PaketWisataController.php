<?php
// app/Http/Controllers/PaketWisataController.php

namespace App\Http\Controllers;

use App\Models\Ketersediaan;
use App\Models\Mobil;
use App\Models\PaketWisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketWisataController extends Controller
{
    public function index()
    {
        $pakets = PaketWisata::all();
        return view('paket-wisata.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket-wisata.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'  => 'required|string|max:255',
            'tempat' => 'required|string',
            'deskripsi' => 'required|string',
            'durasi' => 'required|integer',
            'harga'  => 'required|numeric',
            'foto'   => 'nullable|image|max:2048', // max 2MB
        ]);

        if ($request->hasFile('foto')) {
            // simpan di storage/app/public/paket-wisata
            $data['foto'] = $request->file('foto')
                                 ->store('paket-wisata', 'public');
        }

        PaketWisata::create($data);

        return redirect()
            ->route('paket-wisata.index')
            ->with('success', 'Paket wisata created.');
    }

    public function show(PaketWisata $paketwisata)
    {
        return view('paket-wisata.show', compact('paketwisata'));
    }

    public function edit(PaketWisata $paketwisata)
    {
        return view('paket-wisata.edit', compact('paketwisata'));
    }

    public function update(Request $request, PaketWisata $paketwisata)
    {
        $data = $request->validate([
            'judul'  => 'required|string|max:255',
            'tempat' => 'required|string',
            'deskripsi' => 'required|string',
            'durasi' => 'required|integer',
            'harga'  => 'required|numeric',
            'foto'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // hapus file lama jika ada
            if ($paketwisata->foto) {
                Storage::disk('public')->delete($paketwisata->foto);
            }
            // simpan yang baru
            $data['foto'] = $request->file('foto')
                                 ->store('paket-wisata', 'public');
        }

        $paketwisata->update($data);

        return redirect()
            ->route('paket-wisata.index')
            ->with('success', 'Paket wisata updated.');
    }

    public function destroy(PaketWisata $paketwisata)
    {
        // hapus file foto jika ada
        if ($paketwisata->foto) {
            Storage::disk('public')->delete($paketwisata->foto);
        }

        $paketwisata->delete();

        return redirect()
            ->route('paket-wisata.index')
            ->with('success', 'Paket wisata deleted.');
    }


    public function list()
    {
        $paket = PaketWisata::orderBy('created_at', 'desc')
                            ->get();

        $mobil= Mobil::all();
        return view('paket-wisata.landing-page', compact('paket', 'mobil'));
    }


    public function check(Request $request)
    {


        $date= $request->query('date');



        // mobil yang sudah terpesan pada tanggal itu
        $taken = Ketersediaan::whereDate('tanggal_keberangkatan', $date)
                 ->pluck('mobil_id')
                 ->toArray();
        // available = semua mobil kecuali yg di-taken
        $available = Mobil::whereNotIn('mobil_id', $taken)
                     ->pluck('mobil_id')
                     ->toArray();

        return response()->json($available);
    }
    }
