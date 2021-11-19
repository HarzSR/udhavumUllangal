<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable //Model
{
    // use HasFactory;
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'type', 'mobile', 'email', 'password', 'image', 'status', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
