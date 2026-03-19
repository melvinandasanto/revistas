<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h1>Lista de Autores</h1>

<a href="/autor/create" class="btn btn-success mb-3">
    Crear Autor
</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <tbody>
        @foreach($autors as $autor)
        <tr>
            <td>{{ $autor->id }}</td>
            <td>{{ $autor->nombre }}</td>
            <td>{{ $autor->apellido }}</td>
            <td>{{ $autor->correo }}</td>

            <td>
                <a href="/autor/{{ $autor->id }}/edit" class="btn btn-warning btn-sm">
                    Editar
                </a>
            </td>

            <td>
                <form action="/autor/{{ $autor->id }}" method="POST">
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