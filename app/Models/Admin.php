<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin'; // Guard admin
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function chats()
    {
        return $this->hasMany(Chat::class, 'admin_id', 'id');
    }
}
