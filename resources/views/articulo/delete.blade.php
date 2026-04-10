<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Artículo</title>
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
            <div class="card-header bg-danger">
                <h2 class="card-title mb-0 text-white">
                    <i class="bi bi-trash"></i> Eliminar Artículo
                </h2>
            </div>
            
            <div class="card-body">
                <div class="alert alert-warning">
                    <strong><i class="bi bi-exclamation-triangle"></i> Advertencia:</strong> Esta acción eliminará el artículo de la base de datos de forma permanente.
                </div>

                <div class="alert alert-info">
                    <p><strong>ID:</strong> {{ $articuloE->id }}</p>
                    <p><strong>Título:</strong> {{ $articuloE->titulo }}</p>
                    <p><strong>Página Inicio:</strong> {{ $articuloE->pag_inicio }}</p>
                    <p><strong>Página Fin:</strong> {{ $articuloE->pag_fin }}</p>
                </div>

                <p class="lead text-danger"><strong>¿Está completamente seguro?</strong></p>
            </div>
            
            <div class="card-footer">
                <form action="/articulo/{{$articuloE->id}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i> Confirmar Eliminar
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