<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
use HasFactory, Notifiable;

/**
* The attributes that are mass assignable.
*
* @var array<int, string>
*/
protected $fillable = [
'name',
'email',
'password',
];

/**
* The attributes that should be hidden for serialization.
*
* @var array<int, string>
*/
protected $hidden = [
'password',
'remember_token',
];

/**
* Get the attributes that should be cast.
*
* @return array<string, string>
*/
protected function casts(): array
{
return [
'email_verified_at' => 'datetime',
'password' => 'hashed',
];
}

// Verificar si dos usuarios ya son amigos
public function isFriend()
{
return Friend::where('user_id', $this->id)
->where('friend_id', auth()->id())
->where('accepted', true)
->exists();
}

// Verificar si existe una solicitud pendiente
public function hasFriendRequestPending()
{
return Friend::where('user_id', $this->id)
->where('friend_id', auth()->id())
->where('accepted', false)
->exists();
}
}
