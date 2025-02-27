<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_transaksi', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->unsignedBigInteger('id_pemesanan'); 
            $table->unsignedBigInteger('id_pengguna'); 
            $table->string('nama_pengguna'); 
            $table->decimal('total_harga', 10, 2); 
            $table->string('status_pembayaran'); 
            $table->string('kode_transaksi'); 
            $table->string('nama_produk'); 
            $table->integer('jumlah'); 
            $table->decimal('harga_produk', 10, 2); 
            $table->string('status_produk'); 
            $table->string('bukti_pembayaran')->nullable();
            $table->text('pesan')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_transaksi');
    }
}
