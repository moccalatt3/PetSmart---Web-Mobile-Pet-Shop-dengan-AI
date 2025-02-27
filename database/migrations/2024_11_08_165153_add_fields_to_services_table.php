<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('status_pembayaran')->nullable()->after('catatan_tambahan');
            $table->string('status_layanan')->nullable()->after('status_pembayaran');
            $table->decimal('harga_layanan', 10, 2)->nullable()->after('status_layanan');
            $table->string('bukti_pembayaran')->nullable()->after('harga_layanan');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['status_pembayaran', 'status_layanan', 'harga_layanan', 'bukti_pembayaran']);
        });
    }
};
