<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTransaksiTable extends Migration
{
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('nama_produk')->after('kode_transaksi');
            $table->integer('jumlah')->after('nama_produk');
            $table->decimal('harga_produk', 10, 2)->after('jumlah');
        });
    }

    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn(['nama_produk', 'jumlah', 'harga_produk']);
        });
    }
}
