<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Método para mostrar la vista de edición del perfil
    public function edit()
    {
        return view('profile.edit'); // Retorna la vista 'edit' del perfil
    }

    // Método para actualizar la información del perfil
    public function update(Request $request)
    {
        // Lógica para actualizar el perfil
    }
}
