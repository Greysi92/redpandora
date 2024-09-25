<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    // Enviar solicitud de amistad
    public function sendRequest(User $user)
    {
        Friend::create([
            'user_id' => auth()->id(),
            'friend_id' => $user->id,
            'accepted' => false,
        ]);

        return response()->json(['message' => 'Solicitud de amistad enviada.']);
    }

    // Aceptar solicitud de amistad
    public function acceptRequest(User $user)
    {
        $friend = Friend::where('user_id', $user->id)
            ->where('friend_id', auth()->id())
            ->first();

        if ($friend) {
            $friend->update(['accepted' => true]);
            return response()->json(['message' => 'Solicitud de amistad aceptada.']);
        }

        return response()->json(['error' => 'Solicitud no encontrada.'], 404);
    }

    // Rechazar solicitud de amistad
    public function rejectRequest(User $user)
    {
        $friend = Friend::where('user_id', $user->id)
            ->where('friend_id', auth()->id())
            ->first();

        if ($friend) {
            $friend->delete();
            return response()->json(['message' => 'Solicitud de amistad rechazada.']);
        }

        return response()->json(['error' => 'Solicitud no encontrada.'], 404);
    }

    // Obtener lista de posibles amigos
    public function potentialFriends()
    {
        $friends = User::where('id', '!=', auth()->id())->get(); // Todos menos el usuario autenticado
        return response()->json($friends);
    }
}
