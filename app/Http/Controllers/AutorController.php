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
        $autor->activo = 1;
        $autor->save();

        return redirect('/autor');
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

        return redirect('/autor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eliminado = Autor::find($id);
        $eliminado->delete();

        return redirect('/autor');
    }

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
        } else {
            $autor->activo = 1;
        }

        $autor->save();

        return redirect('/autor');
    }

    /**
     * Mostrar artículos de un autor.
     */
    public function porAutor(string $id)
    {
        $autor = Autor::find($id);
        $asignaciones = \App\Models\ArticuloAutor::where('autor_id', $id)->get();

        return view('autor.por_autor')
            ->with('autor', $autor)
            ->with('asignaciones', $asignaciones);
    }
}