<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerArticulo extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulo = Articulo::all();
        return view('articulo.index')->with('articulo', $articulo);
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
        $articulo = new Articulo();
        $articulo->titulo = $request->get('titulo');
        $articulo->contenido = $request->get('contenido');
        $articulo->save();

        return redirect('/articulo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articulo = Articulo::find($id);
        return view('articulo.delete')->with('articulo', $articulo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articulo = Articulo::find($id);
        $articulo->titulo = $request->get('titulo');
        $articulo->contenido = $request->get('contenido');
        $articulo->save();
        return redirect('/articulo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect('/articulo');
    }
}
