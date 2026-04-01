<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use Illuminate\Http\Request;

class RevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revistas = Revista::all();
        return view('revista.index')->with('resultado', $revistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('revista.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $revista = new Revista();
        $revista->titulo = $request->get('titulo');
        $revista->issn = $request->get('issn');
        $revista->numero = $request->get('numero');
        $revista->anio_publicacion = $request->get('anio_publicacion');
        $revista->activo = 1; // Activado por defecto
        $revista->save();

        return redirect('/revista')->with('success', 'Revista creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $revista = Revista::find($id);
        return view('revista.delete')->with('revistaE', $revista);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $revista = Revista::find($id);
        return view('revista.edit')->with('revistaE', $revista);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $revista = Revista::find($id);
        $revista->titulo = $request->get('titulo');
        $revista->issn = $request->get('issn');
        $revista->numero = $request->get('numero');
        $revista->anio_publicacion = $request->get('anio_publicacion');
        $revista->save();

        return redirect('/revista')->with('success', 'Revista actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eliminado = Revista::find($id);
        $eliminado->delete();

        return redirect('/revista')->with('success', 'Revista eliminada exitosamente');
    }

    /**
     * Show form to change status
     */
    public function deactivate(string $id)
    {
        $revista = Revista::find($id);
        return view('revista.deactivate')->with('revistaE', $revista);
    }

    /**
     * Desactivar o activar registro.
     */
    public function cambiarEstado(string $id)
    {
        $revista = Revista::find($id);
        
        if ($revista->activo == 1) {
            $revista->activo = 0;
            $mensaje = 'Revista desactivada exitosamente';
        } else {
            $revista->activo = 1;
            $mensaje = 'Revista activada exitosamente';
        }
        
        $revista->save();
        
        return redirect('/revista')->with('success', $mensaje);
    }
}