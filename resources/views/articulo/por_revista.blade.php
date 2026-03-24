<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Artículos de la Revista: {{ $revista->titulo }} (ISSN: {{ $revista->ISSN }})</h1>
    <a href="/articulo/create">Crear Artículo</a>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Título</td>
                <td>Página Inicio</td>
                <td>Página Fin</td>
                <td>ID Autor</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
            <tr>
                <td>{{ $articulo->id }}</td>
                <td>{{ $articulo->titulo_art }}</td>
                <td>{{ $articulo->pag_inicio }}</td>
                <td>{{ $articulo->pag_fin }}</td>
                <td>{{ $articulo->autor_id }}</td>
                <td><a href="/articulo/{{ $articulo->id }}/edit">Editar</a></td>
                <td><a href="/articulo/{{ $articulo->id }}">Eliminar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    <br>
    <a href="/revista">Volver a Revistas</a>
</body>
</html>