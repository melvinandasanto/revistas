<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Revista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h2 class="card-title mb-0 text-white">
                            <i class="bi bi-pencil"></i> Editar Revista
                        </h2>
                    </div>
                    
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h5 class="alert-heading">Errores de validación</h5>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="/revista/{{$revistaE->id}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" id="id" value="{{$revistaE->id}}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="issn" class="form-label">ISSN</label>
                                <input type="text" class="form-control" name="issn" id="issn" value="{{ old('issn', $revistaE->issn) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="numero" class="form-label">Número de Revista</label>
                                <input type="text" class="form-control" name="numero" id="numero" value="{{ old('numero', $revistaE->numero) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo', $revistaE->titulo) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="anio_publicacion" class="form-label">Año de Publicación</label>
                                <input type="text" class="form-control" name="anio_publicacion" id="anio_publicacion" value="{{ old('anio_publicacion', $revistaE->anio_publicacion) }}" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-warning">
                                    <i class="bi bi-check2"></i> Actualizar Revista
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <a href="/revista" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>