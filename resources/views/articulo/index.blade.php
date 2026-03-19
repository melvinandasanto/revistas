<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h1>Lista de Artículos</h1>

<a href="/articulo/create" class="btn btn-success mb-3">
    Crear Artículo
</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Página Inicio</th>
            <th>Página Fin</th>
            <th>ISSN</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <tbody>
        @foreach($articulos as $articulo)
        <tr>
            <td>{{ $articulo->id }}</td>
            <td>{{ $articulo->titulo }}</td>
            <td>{{ $articulo->paginainicio }}</td>
            <td>{{ $articulo->paginafin }}</td>
            <td>{{ $articulo->issn }}</td>

            <td>
                <a href="/articulo/{{ $articulo->id }}/edit" class="btn btn-warning btn-sm">
                    Editar
                </a>
            </td>

            <td>
                <form action="/articulo/{{ $articulo->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>