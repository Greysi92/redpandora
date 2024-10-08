<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content'];

    // Relación con comentarios (un post tiene muchos comentarios)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relación con el usuario que creó la publicación
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
