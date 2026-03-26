<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos por Autor</title>
</head>
<body>
    <h1>Artículos en los que participa {{ $autor->nombre }}</h1>

    <table border="1">
        <thead>
            <tr>
                <td>ID Artículo</td>
                <td>Título</td>
                <td>Página Inicio</td>
                <td>Página Fin</td>
                <td>Posición</td>
            </tr>
        </thead>
        <tbody>
            @foreach($asignaciones as $asignacion)
            <tr>
                <td>{{ $asignacion->articulo->id }}</td>
                <td>{{ $asignacion->articulo->titulo }}</td>
                <td>{{ $asignacion->articulo->pag_inicio }}</td>
                <td>{{ $asignacion->articulo->pag_fin }}</td>
                <td>{{ $asignacion->posicion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="/autor">Volver a Autores</a>
</body>
</html>