<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Revista</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h1>Eliminar Revista</h1>

<form action="/revistas/{{ $revista->id }}" method="POST">
    @csrf
    @method('DELETE')

    <fieldset>
        <legend>¿Desea eliminar esta revista?</legend>

        <div class="mb-3">
            <label class="form-label">ISSN</label>
            <input type="text" class="form-control" value="{{ $revista->issn }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" value="{{ $revista->titulo }}" readonly>
        </div>

        <button type="submit" class="btn btn-danger">
            Confirmar Eliminación
        </button>
    </fieldset>

</form>

</body>
</html>