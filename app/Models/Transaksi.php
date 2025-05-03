<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'transaksi_id';
    protected $fillable = ['paketwisata_id', 'pemesan_id', 'pemesanan_id', 'jenis_transaksi', 'jumlah_peserta', 'owe_to_me', 'pay_to_provider', 'total_transaksi', 'transaksi_status'];

    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class, 'peketwisata_id', 'paketwisata_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pemesan_id', 'pelanggan_id');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id', 'pamesanan_id');
    }

    public function detailTransaksi()
    {
        return $this->hasOne(DetailTransaksi::class, 'transaksi_id', 'transaksi_id');
    }
}
