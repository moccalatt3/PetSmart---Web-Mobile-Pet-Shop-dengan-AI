<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id_pemesanan'); // Primary key
            $table->unsignedInteger('id_produk');
            $table->unsignedBigInteger('id_pengguna');
            $table->integer('jumlah')->default(1);
            $table->decimal('harga_produk', 10, 2);
            $table->string('nama_produk', 255);
            $table->string('kode_produk');
            $table->text('deskripsi_produk');
            $table->string('kategori_produk', 100);
            $table->string('gambar_produk')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
