<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'rol' => 'required|in:admin,autor,usuario',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'rol' => $validated['rol'],
            'activo' => 1
        ]);

        return redirect()->route('usuarios.index');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'rol' => 'required|in:admin,autor,usuario',
        ]);

        $usuario->update($validated);

        return redirect()->route('usuarios.index');
    }

    public function delete($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.delete', compact('usuario'));
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->forceDelete();

        return redirect()->route('usuarios.index');
    }

    public function deactivate($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.deactivate', compact('usuario'));
    }

    public function cambiarEstado($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->activo = !$usuario->activo;
        $usuario->save();

        return redirect()->back();
    }

    public function toggle($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->activo = !$usuario->activo;
        $usuario->save();

        return redirect()->back();
    }
}
