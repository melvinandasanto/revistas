<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Revista</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h1>Editar Revista</h1>

<form action="/revista/{{ $revista->id }}" method="POST">
    @csrf
    @method('PUT')

    <fieldset>
        <legend>Datos de la revista</legend>

        <div class="mb-3">
            <label for="issn" class="form-label">ISSN</label>
            <input type="text" name="issn" id="issn" class="form-control" value="{{ $revista->issn }}">
        </div>

        <div class="mb-3">
            <label for="numerorevista" class="form-label">Número de Revista</label>
            <input type="text" name="numerorevista" id="numerorevista" class="form-control" value="{{ $revista->numerorevista }}">
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $revista->titulo }}">
        </div>

        <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
            <input type="text" name="fecha_publicacion" id="fecha_publicacion" class="form-control" value="{{ $revista->fecha_publicacion }}">
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" value="{{ $revista->categoria }}">
        </div>

        <button type="submit" class="btn btn-warning">
            Actualizar Revista
        </button>
    </fieldset>

</form>

</body>
</html>