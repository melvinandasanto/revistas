<?php

namespace App\Http\Controllers;

use App\Models\Autor;

use Illuminate\Http\Request;

class ControllerAutor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::all();
        return view('autor.index')->with('autores', $autores);
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
        $autores = new Autor();
        $autores->nombre = $request->get('nombre');
        $autores->email = $request->get('email');
        $autores->save();

        return redirect('/autor');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autores = Autor::find($id);
        return view('autor.delete')->with('autores', $autores);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $autores = Autor::find($id);
        return view('autor.edit')->with('autores', $autores);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autores = Autor::find($id);
        $autores->nombre = $request->get('nombre');
        $autores->email = $request->get('email');
        $autores->save();
        return redirect('/autor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autores = Autor::find($id);
        $autores->delete();
        return redirect('/autor');
    }
}
