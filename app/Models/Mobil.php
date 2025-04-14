<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $primaryKey = 'tipemobil_id';
    protected $fillable = ['sopir_id', 'nama_kendaraan', 'nomor_kendaraan', 'jumlah_tempat_duduk', 'status_ketersediaan'];

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'sopir_id');
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'tipemobil_id', 'tipemobil_id');
    }
}

