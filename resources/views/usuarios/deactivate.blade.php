<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Estado Usuario</title>
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
                            <i class="bi bi-toggle-off"></i> Cambiar Estado del Usuario
                        </h2>
                    </div>
                    
                    <div class="card-body">
                        @if($usuario->activo)
                            <div class="alert alert-warning" role="alert">
                                <strong><i class="bi bi-exclamation-circle"></i> Desactivar Usuario:</strong> El usuario no podrá acceder al sistema.
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                <strong><i class="bi bi-info-circle"></i> Activar Usuario:</strong> El usuario podrá acceder al sistema nuevamente.
                            </div>
                        @endif

                        <p class="mb-3"><strong>Usuario:</strong> {{ $usuario->name }}</p>
                        <p class="mb-3"><strong>Email:</strong> {{ $usuario->email }}</p>
                        <p class="mb-3"><strong>Rol:</strong> <span class="badge bg-info">{{ ucfirst($usuario->rol) }}</span></p>
                        <p class="mb-4"><strong>Estado Actual:</strong> 
                            <span class="badge {{ $usuario->activo ? 'bg-success' : 'bg-danger' }}">
                                {{ $usuario->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </p>

                        <p class="text-muted">¿Confirmar cambio de estado?</p>

                        <form method="POST" action="{{ route('usuarios.cambiarEstado', $usuario->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-warning">
                                    <i class="bi bi-toggle-on"></i> {{ $usuario->activo ? 'Desactivar' : 'Activar' }}
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
