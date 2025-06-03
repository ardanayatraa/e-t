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
            $table->bigIncrements('transaksi_id');
            $table->unsignedBigInteger('paketwisata_id');
            $table->unsignedBigInteger('pemesan_id');
            $table->unsignedBigInteger('pemesanan_id');
            $table->string('jenis_transaksi', 255);
            $table->string('deposit', 255)->nullable();
            $table->string('balance', 255);
            $table->integer('jumlah_peserta')->unsigned();
            $table->decimal('owe_to_me', 15, 2)->nullable();
            $table->decimal('pay_to_provider', 15, 2)->nullable();
            $table->decimal('additional_charge', 15, 2)->nullable();
            $table->decimal('total_transaksi', 15, 2);
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
