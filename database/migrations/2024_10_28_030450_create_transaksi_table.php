<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi'); // Primary key
            $table->unsignedInteger('id_pemesanan'); // Foreign key to pemesanan
            $table->unsignedBigInteger('id_pengguna'); // Foreign key to pengguna
            $table->decimal('total_harga', 10, 2);
            $table->enum('status_pembayaran', ['lunas', 'belum lunas'])->default('belum lunas');
            $table->string('kode_transaksi', 255)->unique();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan')->onDelete('cascade');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
