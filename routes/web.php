<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KetersediaanController;
use App\Http\Controllers\IncludeModelController;
use App\Http\Controllers\ExcludeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\MobilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

        Route::resource('admin',         AdminController::class);
        Route::resource('paket-wisata', PaketWisataController::class)
        ->parameters(['paket-wisata' => 'paket_wisata']);
        Route::resource('pelanggan',     PelangganController::class);
        Route::resource('sopir',         SopirController::class);
        Route::resource('mobil',         MobilController::class);
        Route::resource('pemesanan',      PemesananController::class)->only(['index','show','edit','update','destroy']);
        Route::resource('ketersediaan',  KetersediaanController::class);
        Route::resource('include', IncludeModelController::class)->except(['show']);
        Route::resource('exclude',       ExcludeController::class)->except(['show']);
        Route::resource('transaksi',      TransaksiController::class)->only(['index','create','store','show']);
        Route::resource('detail-transaksi', DetailTransaksiController::class)->only(['index']);
});


Route::get('/', [PaketWisataController::class, 'list'])->name('paket-wisata.landing');
Route::get('/paket/{paketwisata}', [PaketWisataController::class, 'show'])->name('paket-wisata.show');
Route::get('/booking/create', [PemesananController::class, 'create'])->name('booking.create');
Route::post('/booking', [PemesananController::class, 'store'])->name('booking.store');

    Route::get('/transaksi/{transaksi}/ticket', [TransaksiController::class, 'ticket'])
         ->name('transaksi.ticket');
