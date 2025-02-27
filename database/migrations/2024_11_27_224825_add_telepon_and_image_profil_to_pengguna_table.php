<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeleponAndImageProfilToPenggunaTable extends Migration
{
    public function up()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->string('telepon')->nullable(); // Menambahkan kolom telepon
            $table->string('image_profil')->nullable(); // Menambahkan kolom image_profil
        });
    }

    public function down()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn(['telepon', 'image_profil']); // Menghapus kolom saat rollback
        });
    }
}