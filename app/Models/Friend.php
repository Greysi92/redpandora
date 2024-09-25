<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser llenados
    protected $fillable = ['user_id', 'friend_id', 'accepted'];

    // Relación con el modelo User (usuario que envía la solicitud de amistad)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo User (usuario que recibe la solicitud de amistad)
    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
