<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser llenados
    protected $fillable = ['user_id', 'content'];

    // Relación con el modelo User (un post pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Comment (un post tiene muchos comentarios)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
