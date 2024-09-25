<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Permitir asignación masiva
    protected $fillable = ['from_user_id', 'to_user_id', 'message'];

    // Relación con el usuario que envía el mensaje
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    // Relación con el usuario que recibe el mensaje
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
