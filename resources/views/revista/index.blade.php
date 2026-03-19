<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Revistas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h1>Lista de Revistas</h1>

<a href="/revistas/create" class="btn btn-success mb-3">
    Crear Revista
</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>ISSN</th>
            <th>Número Revista</th>
            <th>Título</th>
            <th>Fecha de Publicación</th>
            <th>Categoría</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <tbody>
        @foreach($revistas as $revista)
        <tr>
            <td>{{ $revista->id }}</td>
            <td>{{ $revista->issn }}</td>
            <td>{{ $revista->numerorevista }}</td>
            <td>{{ $revista->titulo }}</td>
            <td>{{ $revista->fecha_publicacion }}</td>
            <td>{{ $revista->categoria }}</td>

            <td>
                <a href="/revistas/{{ $revista->id }}/edit" class="btn btn-warning btn-sm">
                    Editar
                </a>
            </td>

            <td>
                <form action="/revistas/{{ $revista->id }}" method="POST">
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