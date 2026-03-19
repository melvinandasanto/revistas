<?php

namespace App\Http\Controllers;

use App\Models\Articulo;

use Illuminate\Http\Request;

class ControllerArticulo extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $articulos = new Articulo();
        $articulos->titulo = $request->get('titulo');
        $articulos->contenido = $request->get('contenido');
        $articulos->save();

        return redirect('/articulo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articulos = Articulo::find($id);
        return view('articulo.delete')->with('articulos', $articulos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulos = Articulo::find($id);
        return view('articulo.edit')->with('articulos', $articulos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articulos = Articulo::find($id);
        $articulos->titulo = $request->get('titulo');
        $articulos->contenido = $request->get('contenido');
        $articulos->save();
        return redirect('/articulo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulos = Articulo::find($id);
        $articulos->delete();
        return redirect('/articulo');
    }
}
