<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $primaryKey = 'pelanggan_id';
    protected $fillable = ['nama_pemesan', 'alamat', 'email', 'nomor_whatsapp'];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'pemesan_id', 'pelanggan_id');
    }
}
