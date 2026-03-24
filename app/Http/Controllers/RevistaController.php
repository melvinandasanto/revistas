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
        //
         $revistas = Revista::all();
        return view('revista.index')->with('resultado', $revistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('revista.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $revista = new Revista();
        $revista->ISSN = $request->get('ISSN');
        $revista->numero_revista = $request->get('numero_revista');
        $revista->titulo = $request->get('titulo');
        $revista->fecha_lanzamiento = $request->get('fecha_lanzamiento');
        $revista->categoria = $request->get('categoria');
        $revista->save();
        return redirect('/revista');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $revista = Revista::find($id);
        return view('revista.delete')->with('revistaE', $revista);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $revista = Revista::find($id);
        return view('revista.edit')->with('revistaE', $revista);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $revista = Revista::find($id);
        $revista->ISSN = $request->get('ISSN');
        $revista->numero_revista = $request->get('numero_revista');
        $revista->titulo = $request->get('titulo');
        $revista->fecha_lanzamiento = $request->get('fecha_lanzamiento');
        $revista->categoria = $request->get('categoria');
        $revista->save();
        return redirect('/revista');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eliminado = Revista::find($id);
        $eliminado->delete();
        return redirect('/revista');

    }
}
