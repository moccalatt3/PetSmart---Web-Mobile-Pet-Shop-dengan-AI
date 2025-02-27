<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk'); // Primary key
            $table->string('kode_produk')->unique();
            $table->string('nama_produk', 255);
            $table->text('deskripsi_produk');
            $table->decimal('harga_produk', 10, 2);
            $table->integer('stok_produk');
            $table->string('kategori_produk', 100);
            $table->enum('status_produk', ['Tersedia', 'Tidak Tersedia'])->default('Tersedia');
            $table->string('gambar_produk')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
