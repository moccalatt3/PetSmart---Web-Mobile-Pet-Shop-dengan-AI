<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // Insert default admin data
        DB::table('admins')->insert([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin09876'), // Hashed password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
