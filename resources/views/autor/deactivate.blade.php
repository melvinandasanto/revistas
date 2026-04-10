<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Estado de Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .container-card {
            max-width: 600px;
            margin: 50px auto;
        }
    </style>
</head>
<body>
    <div class="container container-card">
        <div class="card">
            <div class="card-header bg-warning">
                <h2 class="card-title mb-0 text-white">Cambiar Estado de Autor</h2>
            </div>
            
            <div class="card-body">
                <div class="alert alert-info">
                    <p><strong>ID:</strong> {{ $autorE->id }}</p>
                    <p><strong>Nombre:</strong> {{ $autorE->nombre }}</p>
                    <p><strong>Correo:</strong> {{ $autorE->correo }}</p>
                    <p><strong>Adscripción:</strong> {{ $autorE->adscripcion }}</p>
                    <p><strong>Estado actual:</strong> 
                        <span class="{{ $autorE->activo == 1 ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                            {{ $autorE->activo == 1 ? 'Activo' : 'Inactivo' }}
                        </span>
                    </p>
                </div>
                
                <p class="lead">¿Está seguro que desea {{ $autorE->activo == 1 ? 'DESACTIVAR' : 'ACTIVAR' }} este autor?</p>
                
                @if($autorE->activo == 1)
                    <div class="alert alert-warning">
                        <strong>Nota:</strong> Al desactivar este autor, no podrá ser seleccionado en nuevos artículos.
                    </div>
                @else
                    <div class="alert alert-success">
                        <strong>Nota:</strong> Al activar este autor, estará disponible para ser seleccionado en artículos.
                    </div>
                @endif
            </div>
            
            <div class="card-footer">
                <form action="{{ route('autor.cambiarEstado', $autorE->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-outline-danger">
                        {{ $autorE->activo == 1 ? 'Desactivar' : 'Activar' }}
                    </button>
                </form>
                <a href="/autor">
                    <button type="button" class="btn btn-outline-secondary">Cancelar</button>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>