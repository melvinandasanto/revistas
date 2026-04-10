<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Estado de Artículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h2 class="card-title mb-0">Cambiar Estado de Artículo</h2>
            </div>
            
            <div class="card-body">
                <div class="alert alert-info">
                    <p><strong>ID:</strong> {{ $articuloE->id }}</p>
                    <p><strong>Título:</strong> {{ $articuloE->titulo }}</p>
                    <p><strong>Página Inicio:</strong> {{ $articuloE->pag_inicio }}</p>
                    <p><strong>Página Fin:</strong> {{ $articuloE->pag_fin }}</p>
                    <p><strong>Estado actual:</strong> 
                        <span class="{{ $articuloE->activo == 1 ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                            {{ $articuloE->activo == 1 ? 'Activo' : 'Inactivo' }}
                        </span>
                    </p>
                </div>
                
                <p class="lead">¿Está seguro que desea {{ $articuloE->activo == 1 ? 'DESACTIVAR' : 'ACTIVAR' }} este artículo?</p>
                
                @if($articuloE->activo == 1)
                    <div class="alert alert-warning">
                        <strong>Nota:</strong> Al desactivar este artículo, no aparecerá en listados de artículos activos.
                    </div>
                @else
                    <div class="alert alert-success">
                        <strong>Nota:</strong> Al activar este artículo, estará visible en los listados de artículos.
                    </div>
                @endif
            </div>
            
            <div class="card-footer">
                <form action="{{ route('articulo.cambiarEstado', $articuloE->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-outline-danger">
                        {{ $articuloE->activo == 1 ? 'Desactivar' : 'Activar' }}
                    </button>
                </form>
                <a href="/articulo">
                    <button type="button" class="btn btn-outline-secondary">Cancelar</button>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
