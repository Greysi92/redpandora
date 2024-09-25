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

        return redirect()->back()->with('message', 'Solicitud de amistad enviada.');
    }

    // Aceptar solicitud de amistad
    public function acceptRequest(User $user)
    {
        $friend = Friend::where('user_id', $user->id)
            ->where('friend_id', auth()->id())
            ->first();

        if ($friend) {
            $friend->update(['accepted' => true]);
            return redirect()->back()->with('message', 'Solicitud de amistad aceptada.');
        }

        return redirect()->back()->with('error', 'Solicitud no encontrada.');
    }

    // Rechazar solicitud de amistad
    public function rejectRequest(User $user)
    {
        $friend = Friend::where('user_id', $user->id)
            ->where('friend_id', auth()->id())
            ->first();

        if ($friend) {
            $friend->delete();
            return redirect()->back()->with('message', 'Solicitud de amistad rechazada.');
        }

        return redirect()->back()->with('error', 'Solicitud no encontrada.');
    }
}

