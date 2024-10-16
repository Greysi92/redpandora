<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'country', 'city'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relación con el modelo Post (un usuario puede tener muchas publicaciones)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Relación con el modelo Comment (un usuario puede tener muchos comentarios)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
