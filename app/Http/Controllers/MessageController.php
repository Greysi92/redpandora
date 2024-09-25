<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(User $user)
    {
        $messages = Message::where(function($query) use ($user) {
            $query->where('from_user_id', auth()->id())
                ->where('to_user_id', $user->id);
        })->orWhere(function($query) use ($user) {
            $query->where('from_user_id', $user->id)
                ->where('to_user_id', auth()->id());
        })->get();

        return view('messages.index', compact('messages', 'user'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|max:255',
        ]);

        Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $user->id,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }
}
