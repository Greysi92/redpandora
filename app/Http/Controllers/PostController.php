<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Mostrar todas las publicaciones
    public function index()
    {
        $posts = Post::with('user')->latest()->get(); // Obtener todas las publicaciones con el usuario
        return response()->json($posts);
    }

    // Crear una nueva publicación
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'content' => $request->contentform,
        ]);

        return response()->json($post, 201);
    }
}
