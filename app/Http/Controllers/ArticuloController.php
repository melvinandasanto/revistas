<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Revista;
use App\Models\Autor;
use App\Models\Articulo_Autor;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostrar todos los artículos con sus relaciones
        $articulos = Articulo::with(['revista', 'articuloAutores.autor'])->get();
        return view('articulo.index')->with('resultado', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Solo mostrar revistas y autores ACTIVOS
        $revistas = Revista::where('activo', 1)->get();
        $autores = Autor::where('activo', 1)->get();

        return view('articulo.create')
            ->with('revistas', $revistas)
            ->with('autores', $autores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $articulo = new Articulo();
        $articulo->titulo = $request->get('titulo');
        $articulo->pag_inicio = $request->get('pag_inicio');
        $articulo->pag_fin = $request->get('pag_fin');
        $articulo->revista_id = $request->get('revista_id');
        $articulo->activo = 1;
        $articulo->save();

        $autores = $request->get('autores');

        if ($autores != null) {
            $posicion = 1;

            foreach ($autores as $autorId) {
                if ($autorId != "") {
                    // Verificar que el autor esté activo
                    $autor = Autor::find($autorId);
                    if ($autor && $autor->activo == 1) {
                        $articuloAutor = new Articulo_Autor();
                        $articuloAutor->articulo_id = $articulo->id;
                        $articuloAutor->autor_id = $autorId;
                        $articuloAutor->posicion = $posicion;
                        $articuloAutor->activo = 1;
                        $articuloAutor->save();
                        $posicion++;
                    }
                }
            }
        }

        return redirect('/articulo')->with('success', 'Artículo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articulo = Articulo::find($id);
        return view('articulo.delete')->with('articuloE', $articulo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulo = Articulo::find($id);
        // Solo mostrar revistas y autores ACTIVOS
        $revistas = Revista::where('activo', 1)->get();
        $autores = Autor::where('activo', 1)->get();
        $asignaciones = Articulo_Autor::where('articulo_id', $id)
            ->with('autor')
            ->orderBy('posicion')
            ->get();

        return view('articulo.edit')
            ->with('articuloE', $articulo)
            ->with('revistas', $revistas)
            ->with('autores', $autores)
            ->with('asignaciones', $asignaciones);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articulo = Articulo::find($id);
        $articulo->titulo = $request->get('titulo');
        $articulo->pag_inicio = $request->get('pag_inicio');
        $articulo->pag_fin = $request->get('pag_fin');
        $articulo->revista_id = $request->get('revista_id');
        $articulo->save();

        Articulo_Autor::where('articulo_id', $id)->delete();

        $autores = $request->get('autores');

        if ($autores != null) {
            $posicion = 1;

            foreach ($autores as $autorId) {
                if ($autorId != "") {
                    // Verificar que el autor esté activo
                    $autor = Autor::find($autorId);
                    if ($autor && $autor->activo == 1) {
                        $articuloAutor = new Articulo_Autor();
                        $articuloAutor->articulo_id = $articulo->id;
                        $articuloAutor->autor_id = $autorId;
                        $articuloAutor->posicion = $posicion;
                        $articuloAutor->activo = 1;
                        $articuloAutor->save();
                        $posicion++;
                    }
                }
            }
        }

        return redirect('/articulo')->with('success', 'Artículo actualizado exitosamente');
    }

    /**
     * Mostrar artículos por revista (solo revistas activas y artículos activos)
     */
    public function porRevista(string $id)
    {
        $revista = Revista::find($id);
        
        if (!$revista || $revista->activo == 0) {
            return redirect('/revista')->with('error', 'Revista no encontrada o desactivada');
        }
        
        $articulos = Articulo::where('revista_id', $id)
            ->where('activo', 1)
            ->get();

        return view('articulo.por_revista')
            ->with('articulos', $articulos)
            ->with('revista', $revista);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eliminado = Articulo::find($id);
        $eliminado->delete();

        return redirect('/articulo')->with('success', 'Artículo eliminado exitosamente');
    }

    /**
     * Desactivar o activar registro.
     */
    public function cambiarEstado(string $id)
    {
        $articulo = Articulo::find($id);

        if ($articulo->activo == 1) {
            $articulo->activo = 0;
            $mensaje = 'Artículo desactivado exitosamente';
        } else {
            $articulo->activo = 1;
            $mensaje = 'Artículo activado exitosamente';
        }

        $articulo->save();

        return redirect('/articulo')->with('success', $mensaje);
    }
}