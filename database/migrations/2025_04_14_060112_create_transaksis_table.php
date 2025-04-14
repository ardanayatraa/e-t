<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('transaksi_id');
            $table->unsignedBigInteger('peketwisata_id');
            $table->unsignedBigInteger('pemesan_id');
            $table->unsignedBigInteger('pemesanan_id');
            $table->string('jenis_transakasi', 255);
            $table->integer('jumlah_peserta');
            $table->decimal('owe_to_me', 15, 2);
            $table->decimal('pay_to_provider', 15, 2);
            $table->decimal('total_transaksai', 15, 2);
            $table->string('transaksi_status', 100);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
