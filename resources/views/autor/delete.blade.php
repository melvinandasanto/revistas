<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Autor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h1>Eliminar Autor</h1>

<form action="/autor/{{ $autor->id }}" method="POST">
    @csrf
    @method('DELETE')

    <fieldset>
        <legend>¿Desea eliminar este autor?</legend>

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" value="{{ $autor->nombre }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="text" class="form-control" value="{{ $autor->correo }}" readonly>
        </div>

        <button type="submit" class="btn btn-danger">
            Confirmar Eliminación
        </button>
    </fieldset>

</form>

</body>
</html>