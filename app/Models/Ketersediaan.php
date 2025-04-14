<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketersediaan extends Model
{
    protected $primaryKey = 'terpesan_id';
    protected $fillable = ['pemesanan_id', 'mobil_id', 'supir_id', 'tanggal_keberangkatan', 'status_ketersediaan'];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id', 'pamesanan_id');
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id', 'tipemobil_id');
    }

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'supir_id', 'sopir_id');
    }
}
