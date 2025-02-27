<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('id_services'); // Mengganti id dengan id_services
            $table->string('nama_pelanggan');
            $table->string('nomor_kontak');
            $table->string('jenis_hewan');
            $table->string('paket_layanan');
            $table->date('tanggal_layanan');
            $table->text('catatan_tambahan')->nullable();
            $table->string('jenis_layanan');
            $table->unsignedBigInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');

            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
