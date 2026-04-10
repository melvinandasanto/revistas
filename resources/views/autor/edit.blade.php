<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
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
                            <i class="bi bi-pencil"></i> Editar Autor
                        </h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="/autor/{{$autorE->id}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" id="id" value="{{$autorE->id}}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{$autorE->nombre}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo" value="{{$autorE->correo}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="adscripcion" class="form-label">Adscripción</label>
                                <input type="text" class="form-control" name="adscripcion" id="adscripcion" value="{{$autorE->adscripcion}}">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-warning">
                                    <i class="bi bi-check2"></i> Actualizar Autor
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <a href="/autor" class="btn btn-outline-secondary">
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