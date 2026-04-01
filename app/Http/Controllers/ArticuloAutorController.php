<?php

namespace App\Http\Controllers;

use App\Models\Articulo_Autor;
use App\Models\Articulo;
use App\Models\Autor;
use Illuminate\Http\Request;

class ArticuloAutorController extends Controller
{
    /**
     * Mostrar autores asignados a un artículo.
     */
    public function index(string $id)
    {
        $articulo = Articulo::find($id);
        $autores = Autor::all();
        $asignaciones = ArticuloAutor::where('articulo_id', $id)->get();

        return view('articulo_autor.index')
            ->with('articulo', $articulo)
            ->with('autores', $autores)
            ->with('asignaciones', $asignaciones);
    }

    /**
     * Guardar nueva asignación.
     */
    public function store(Request $request)
    {
        $articuloAutor = new Articulo_Autor();
        $articuloAutor->articulo_id = $request->get('articulo_id');
        $articuloAutor->autor_id = $request->get('autor_id');
        $articuloAutor->posicion = $request->get('posicion');
        $articuloAutor->activo = 1;
        $articuloAutor->save();

        return redirect('/articulo_autor/' . $request->get('articulo_id'));
    }

    /**
     * Mostrar formulario para editar asignación.
     */
    public function edit(string $id)
    {
        $asignacion = Articulo_Autor::find($id);
        $autores = Autor::all();

        return view('articulo_autor.edit')
            ->with('asignacionE', $asignacion)
            ->with('autores', $autores);
    }

    /**
     * Actualizar asignación.
     */
    public function update(Request $request, string $id)
    {
        $asignacion = Articulo_Autor::find($id);
        $asignacion->autor_id = $request->get('autor_id');
        $asignacion->posicion = $request->get('posicion');
        $asignacion->save();

        return redirect('/articulo_autor/' . $asignacion->articulo_id);
    }

    /**
     * Eliminar asignación.
     */
    public function destroy(string $id)
    {
        $eliminado = Articulo_Autor::find($id);
        $articuloId = $eliminado->articulo_id;
        $eliminado->delete();

        return redirect('/articulo_autor/' . $articuloId);
    }

    /**
     * Desactivar o activar asignación.
     */
    public function cambiarEstado(string $id)
    {
        $asignacion = Articulo_Autor::find($id);

        if ($asignacion->activo == 1) {
            $asignacion->activo = 0;
        } else {
            $asignacion->activo = 1;
        }

        $asignacion->save();

        return redirect('/articulo_autor/' . $asignacion->articulo_id);
    }
}