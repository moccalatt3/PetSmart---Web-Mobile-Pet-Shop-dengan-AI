<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusBuktiPesanToTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('status_produk')->nullable()->after('status_pembayaran'); // Kolom status produk
            $table->string('bukti_pembayaran')->nullable()->after('status_produk'); // Kolom untuk gambar bukti pembayaran
            $table->text('pesan')->nullable()->after('bukti_pembayaran'); // Kolom pesan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('status_produk');
            $table->dropColumn('bukti_pembayaran');
            $table->dropColumn('pesan');
        });
    }
}
