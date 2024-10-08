<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'content'];

    // Relación con el modelo Post (cada comentario pertenece a un post)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relación con el modelo User (cada comentario pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
