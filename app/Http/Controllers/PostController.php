<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Mostrar todas las publicaciones
    public function index()
    {
        $posts = Post::with(['user', 'comments'])->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Almacenar una nueva publicación
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('message', 'Publicación creada exitosamente.');
    }
}
