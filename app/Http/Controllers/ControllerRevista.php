<?php

namespace App\Http\Controllers;

use App\Models\Revista;

use Illuminate\Http\Request;

class ControllerRevista extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revistas = Revista::all();
        return view('revista.index')->with('revistas', $revistas);
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
        $revistas = new Revista();
        $revistas->nombre = $request->get('nombre');
        $revistas->descripcion = $request->get('descripcion');
        $revistas->save();

        return redirect('/revista');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $revistas = Revista::find($id);
        return view('revista.delete')->with('revistas', $revistas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $revistas = Revista::find($id);
        return view('revista.edit')->with('revistas', $revistas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $revistas = Revista::find($id);
        $revistas->nombre = $request->get('nombre');
        $revistas->descripcion = $request->get('descripcion');
        $revistas->save();
        return redirect('/revista');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $revistas = Revista::find($id);
        $revistas->delete();
        return redirect('/revista');
    }
}
