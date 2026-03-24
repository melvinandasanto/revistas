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
        //
         $autores = Autor::all();
        return view('autor.index')->with('resultado', $autores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $autor = new Autor();
        $autor->nombre = $request->get('nombre');
        $autor->apellido = $request->get('apellido');
        $autor->correo = $request->get('correo');
        $autor->save();
        return redirect('/autor');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $autor = Autor::find($id);
        return view('autor.delete')->with('autorE', $autor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $autor = Autor::find($id);
        return view('autor.edit')->with('autorE', $autor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $autor = Autor::find($id);
        $autor->nombre = $request->get('nombre');
        $autor->apellido = $request->get('apellido');
        $autor->correo = $request->get('correo');
        $autor->save();
        return redirect('/autor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eliminado = Autor::find($id);
        $eliminado->delete();
        return redirect('/autor');
    }
}
