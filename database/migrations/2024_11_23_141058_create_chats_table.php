<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id('id_chat');                             // Primary key
            $table->unsignedBigInteger('pengguna_id');         // Foreign key ke pengguna
            $table->unsignedBigInteger('admin_id');            // Foreign key ke admin
            $table->string('nama_pengguna');                   // Nama pengguna
            $table->text('message');                           // Pesan chat
            $table->boolean('is_from_admin')->default(false);  // Apakah pesan dari admin
            $table->timestamps();

            // Relasi ke tabel pengguna
            $table->foreign('pengguna_id')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
            
            // Relasi ke tabel admin
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
}
