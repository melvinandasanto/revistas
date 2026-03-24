<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Revistas</h1>
    <a href="/revista/create">Crear Revista</a>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>ISSN</td>
                <td>Número</td>
                <td>Título</td>
                <td>Fecha Lanzamiento</td>
                <td>Categoría</td>
                <td>Editar</td>
                <td>Eliminar</td>
                <td>Artículos</td>
            </tr>
        </thead>
        <tbody>
            @foreach($resultado as $revista)
            <tr>
                <td>{{ $revista->id }}</td>
                <td>{{ $revista->ISSN }}</td>
                <td>{{ $revista->numero_revista }}</td>
                <td>{{ $revista->titulo }}</td>
                <td>{{ $revista->fecha_lanzamiento }}</td>
                <td>{{ $revista->categoria }}</td>
                <td><a href="/revista/{{ $revista->id }}/edit">Editar</a></td>
                <td><a href="/revista/{{ $revista->id }}">Eliminar</a></td>
                <td><a href="/articulo/revista/{{ $revista->id }}">Ver Artículos</a></td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    <br>
    <a href="/">Volver al Menú</a>
</body>
</html>