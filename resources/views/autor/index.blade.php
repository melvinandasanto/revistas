<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Autores</h1>
    <a href="/autor/create">Crear Autor</a>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Correo</td>
                <td>Editar</td>
                <td>Eliminar</td>
                <td>Artículos</td>
            </tr>
        </thead>
        <tbody>
            @foreach($resultado as $autor)
            <tr>
                <td>{{ $autor->id }}</td>
                <td>{{ $autor->nombre }}</td>
                <td>{{ $autor->apellido }}</td>
                <td>{{ $autor->correo }}</td>
                <td>{{ $autor->adscripcion }}</td>
                <td><a href="/autor/{{ $autor->id }}/edit">Editar</a></td>
                <td><a href="/autor/{{ $autor->id }}/deactivate">Desactivar</a></td>
                <td><a href="/articulo/autor/{{ $autor->id }}">Ver Artículos</a></td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    <br>
    <a href="/">Volver al Menú</a>
</body>
</html>