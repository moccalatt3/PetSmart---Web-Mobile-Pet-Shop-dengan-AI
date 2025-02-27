<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatServicesTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_services', function (Blueprint $table) {
            $table->id('id_services'); // Gunakan id_services sebagai primary key
            $table->string('nama_pelanggan');
            $table->string('nomor_kontak');
            $table->string('jenis_hewan');
            $table->string('paket_layanan');
            $table->date('tanggal_layanan');
            $table->text('catatan_tambahan')->nullable();
            $table->string('jenis_layanan');
            $table->unsignedBigInteger('id_pengguna'); // Asumsikan ini adalah foreign key
            $table->string('status_pembayaran');
            $table->string('status_layanan');
            $table->decimal('harga_layanan', 10, 2);
            $table->string('bukti_pembayaran')->nullable();
            $table->string('kode_layanan');
            $table->text('pesan')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_services');
    }
}