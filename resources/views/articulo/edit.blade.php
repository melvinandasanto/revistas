<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h1>Editar Artículo</h1>

<form action="/articulos/{{ $articulo->id }}" method="POST">
    @csrf
    @method('PUT')

    <fieldset>
        <legend>Datos del artículo</legend>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $articulo->titulo }}">
        </div>

        <div class="mb-3">
            <label for="paginainicio" class="form-label">Página Inicio</label>
            <input type="text" name="paginainicio" id="paginainicio" class="form-control" value="{{ $articulo->paginainicio }}">
        </div>

        <div class="mb-3">
            <label for="paginafin" class="form-label">Página Fin</label>
            <input type="text" name="paginafin" id="paginafin" class="form-control" value="{{ $articulo->paginafin }}">
        </div>

        <div class="mb-3">
            <label for="issn" class="form-label">ISSN</label>
            <input type="text" name="issn" id="issn" class="form-control" value="{{ $articulo->issn }}">
        </div>

        <button type="submit" class="btn btn-warning">
            Actualizar Artículo
        </button>
    </fieldset>

</form>

</body>
</html>