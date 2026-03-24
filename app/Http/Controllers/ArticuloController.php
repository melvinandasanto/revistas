<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Revista;
use App\Models\Autor;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articulos = Articulo::all();
        return view('articulo.index')->with('resultado', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $revistas = Revista::all();
        $autores = Autor::all();
        return view('articulo.create')
            ->with('revistas', $revistas)
            ->with('autores', $autores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $articulo = new Articulo();
        $articulo->titulo_art = $request->get('titulo_art');
        $articulo->pag_inicio = $request->get('pag_inicio');
        $articulo->pag_fin = $request->get('pag_fin');
        $articulo->revista_id = $request->get('revista_id');
        $articulo->autor_id = $request->get('autor_id');
        $articulo->save();
        return redirect('/articulo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $articulo = Articulo::find($id);
        return view('articulo.delete')->with('articuloE', $articulo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $articulo = Articulo::find($id);
        $revistas = Revista::all();
        $autores = Autor::all();
        return view('articulo.edit')
            ->with('articuloE', $articulo)
            ->with('revistas', $revistas)
            ->with('autores', $autores);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $articulo = Articulo::find($id);
        $articulo->titulo_art = $request->get('titulo_art');
        $articulo->pag_inicio = $request->get('pag_inicio');
        $articulo->pag_fin = $request->get('pag_fin');
        $articulo->revista_id = $request->get('revista_id');
        $articulo->autor_id = $request->get('autor_id');
        $articulo->save();
        return redirect('/articulo');
    }

        public function porRevista(string $id)
    {
        $revista = Revista::find($id);
        $articulos = Articulo::where('revista_id', $id)->get();
        return view('articulo.por_revista')
            ->with('articulos', $articulos)
            ->with('revista', $revista);
    }

     public function porAutor(string $id)
    {
        $autor = Autor::find($id);
        $articulos = Articulo::where('autor_id', $id)->get();
        return view('articulo.por_autor')
            ->with('articulos', $articulos)
            ->with('autor', $autor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eliminado = Articulo::find($id);
        $eliminado->delete();
        return redirect('/articulo');
    }
}
