<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos</title>
</head>
<body>
    <h1>Lista de Artículos</h1>

    <a href="/articulo/create">Crear Artículo</a>

    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Título</td>
                <td>Página Inicio</td>
                <td>Página Fin</td>
                <td>Revista</td>
                <td>Autores</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            @foreach($resultado as $articulo)
            <tr>
                <td>{{ $articulo->id }}</td>
                <td>{{ $articulo->titulo }}</td>
                <td>{{ $articulo->pag_inicio }}</td>
                <td>{{ $articulo->pag_fin }}</td>
                <td>
                    @if($articulo->revista)
                        {{ $articulo->revista->titulo }}
                    @else
                        Sin revista
                    @endif
                </td>
                <td>
                    @if($articulo->articuloAutores && $articulo->articuloAutores->count() > 0)
                        @foreach($articulo->articuloAutores as $detalle)
                            {{ $detalle->autor->nombre }} (Posición: {{ $detalle->posicion }})<br>
                        @endforeach
                    @else
                        Sin autores
                    @endif
                </td>
                <td><a href="/articulo/{{ $articulo->id }}/edit">Editar</a></td>
                <td><a href="/articulo/{{ $articulo->id }}">Eliminar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="/revista">Volver a Revistas</a> |
    <a href="/autor">Volver a Autores</a>

    <br>
    <a href="/">Volver al Menú</a>
</body>
</html>