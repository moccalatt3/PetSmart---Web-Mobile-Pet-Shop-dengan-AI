<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';
    protected $primaryKey = 'id_chat';

    protected $fillable = [
        'pengguna_id',
        'admin_id',
        'nama_pengguna',
        'message',
        'is_from_admin',
    ];

    /**
     * Relasi ke model Pengguna.
     */
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id', 'id_pengguna');
    }

    /**
     * Relasi ke model Admin.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
