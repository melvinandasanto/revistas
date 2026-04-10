<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Revista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success">
                        <h2 class="card-title mb-0 text-white">
                            <i class="bi bi-plus-circle"></i> Crear Revista
                        </h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="/revista" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="issn" class="form-label">ISSN</label>
                                <input type="text" class="form-control" name="issn" id="issn" required>
                            </div>

                            <div class="mb-3">
                                <label for="numero" class="form-label">Número de Revista</label>
                                <input type="text" class="form-control" name="numero" id="numero" required>
                            </div>

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" required>
                            </div>

                            <div class="mb-3">
                                <label for="anio_publicacion" class="form-label">Año de Publicación</label>
                                <input type="text" class="form-control" name="anio_publicacion" id="anio_publicacion" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-check2"></i> Guardar Revista
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