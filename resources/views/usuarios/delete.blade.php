<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h2 class="card-title mb-0 text-white">
                            <i class="bi bi-exclamation-triangle"></i> Confirmar Eliminación
                        </h2>
                    </div>
                    
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <strong><i class="bi bi-exclamation-circle"></i> Atención:</strong> Esta acción eliminará permanentemente al usuario del sistema.
                        </div>

                        <p class="mb-3"><strong>Usuario:</strong> {{ $usuario->name }}</p>
                        <p class="mb-3"><strong>Email:</strong> {{ $usuario->email }}</p>
                        <p class="mb-4"><strong>Rol:</strong> <span class="badge bg-info">{{ ucfirst($usuario->rol) }}</span></p>

                        <p class="text-muted">¿Deseas continuar con la eliminación?</p>

                        <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                            @csrf
                            @method('DELETE')

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="bi bi-trash"></i> Confirmar Eliminación
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary">
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
