<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar login
    public function login()
    {
        if(auth()->check()) {
            return redirect('/menu'); // si ya inició sesión, va al menú principal
        }

        return view('login.login'); // resources/views/login/login.blade.php
    }

    // Procesar login
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/menu'); // ir al menú principal
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
}