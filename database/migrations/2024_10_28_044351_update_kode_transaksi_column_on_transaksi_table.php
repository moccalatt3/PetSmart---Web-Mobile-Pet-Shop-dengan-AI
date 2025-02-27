<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropUnique('transaksi_kode_transaksi_unique'); // Menghapus constraint unique
        });
    }

    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->unique('kode_transaksi'); // Tambahkan kembali jika ingin revert
        });
    }

};
