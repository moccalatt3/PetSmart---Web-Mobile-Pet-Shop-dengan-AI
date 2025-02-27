<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';

    // Primary key diubah menjadi 'id_pengguna'
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'name', 'email', 'password', 'telepon', 'image_profil', // Tambahkan kolom baru di sini
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function chats()
    {
        return $this->hasMany(Chat::class, 'pengguna_id', 'id_pengguna');
    }
}