<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostrar todos los autores (incluyendo inactivos)
        $autores = Autor::all();
        return view('autor.index')->with('resultado', $autores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = new Autor();
        $autor->nombre = $request->get('nombre');
        $autor->correo = $request->get('correo');
        $autor->adscripcion = $request->get('adscripcion');
        $autor->activo = 1; // Activado por defecto
        $autor->save();

        return redirect('/autor')->with('success', 'Autor creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autor = Autor::find($id);
        return view('autor.delete')->with('autorE', $autor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $autor = Autor::find($id);
        return view('autor.edit')->with('autorE', $autor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = Autor::find($id);
        $autor->nombre = $request->get('nombre');
        $autor->correo = $request->get('correo');
        $autor->adscripcion = $request->get('adscripcion');
        $autor->save();

        return redirect('/autor')->with('success', 'Autor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eliminado = Autor::find($id);
        $eliminado->delete();

        return redirect('/autor')->with('success', 'Autor eliminado exitosamente');
    }

    /**
     * Show form to change status
     */
    public function deactivate(string $id)
    {
        $autor = Autor::find($id);
        return view('autor.deactivate')->with('autorE', $autor);
    }

    /**
     * Desactivar o activar registro.
     */
    public function cambiarEstado(string $id)
    {
        $autor = Autor::find($id);
        
        if ($autor->activo == 1) {
            $autor->activo = 0;
            $mensaje = 'Autor desactivado exitosamente';
        } else {
            $autor->activo = 1;
            $mensaje = 'Autor activado exitosamente';
        }
        
        $autor->save();
        
        return redirect('/autor')->with('success', $mensaje);
    }

    /**
     * Mostrar artículos de un autor (solo autores activos)
     */
    public function porAutor(string $id)
    {
        $autor = Autor::find($id);
        
        // Verificar si el autor existe
        if (!$autor) {
            return redirect('/autor')->with('error', 'Autor no encontrado');
        }
        
        // Obtener solo asignaciones de artículos activos
        $asignaciones = \App\Models\Articulo_Autor::where('autor_id', $id)
            ->whereHas('articulo', function($query) {
                $query->where('activo', 1);
            })
            ->with(['articulo' => function($query) {
                $query->where('activo', 1);
            }])
            ->orderBy('posicion')
            ->get();
            
        return view('autor.por_autor')
            ->with('autor', $autor)
            ->with('asignaciones', $asignaciones);
    }
}