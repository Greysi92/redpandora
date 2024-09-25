<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Metodo para almacenar el comentario
    public function store(Request $request)
    {
        // Validación del contenido y del ID del post
        $request->validate([
            'post_id' => 'required|exists:posts,id', // Asegura que el post exista
            'content' => 'required|max:255', // Requiere que el contenido no sea vacío y tenga un máximo de 255 caracteres
        ]);

        // Crear el comentario usando los datos validados
        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->id(), // El ID del usuario autenticado
            'content' => $request->content, // El contenido del comentario
        ]);

        // Redireccionar de vuelta a la página anterior después de guardar el comentario
        return redirect()->back()->with('message', 'Comentario agregado con éxito.');
    }
}
