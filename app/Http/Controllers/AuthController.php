<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar login
    public function login()
    {
        if(auth()->check()) {
            // Redirige según rol si ya está logueado
            return redirect('/menu');
        }

        return view('login.login'); 
    }

    // Procesar login
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Buscar el usuario primero
        $user = User::where('email', $request->email)->first();

        //  Si el usuario existe pero está desactivado
        if ($user && !$user->activo) {
            return back()->withErrors(['email' => 'Usuario desactivado']);
        }

        // ✅ Intentar login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/menu');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); // volver al login
    }
     // Mostrar formulario de nuevo usuario
    public function createUser()
    {
        return view('usuarios.create'); // resources/views/usuarios/create.blade.php
    }

    // Guardar usuario nuevo
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // confirma con password_confirmation
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/usuarios')->with('success', 'Usuario creado correctamente');
    }
}
