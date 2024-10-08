<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $user = Auth::user();  // Obtener el usuario autenticado
        $posts = $user->posts()->latest()->get(); // Obtener las publicaciones del usuario

        return view('profile.edit', compact('user', 'posts'));
    }


    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user(); // Obtener el usuario autenticado

        // Actualizar los datos del usuario
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Si se proporciona una nueva contrase?a, actualizarla
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado exitosamente');
    }

    /**
     * Delete the user's account.
     */
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'Perfil eliminado exitosamente');
    }
}
