<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos del Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1><i class="bi bi-person-circle"></i> Artículos del Autor</h1>
                <h5 class="text-muted">{{ $autor->nombre }} ({{ $autor->correo }})</h5>
            </div>
            <a href="/autor" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver a Autores
            </a>
        </div>

        @if($asignaciones->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID Artículo</th>
                            <th>Título</th>
                            <th>Revista</th>
                            <th>Página Inicio</th>
                            <th>Página Fin</th>
                            <th>Posición</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asignaciones as $asignacion)
                        <tr>
                            <td>{{ $asignacion->articulo->id }}</td>
                            <td>{{ $asignacion->articulo->titulo }}</td>
                            <td>
                                @if($asignacion->articulo->revista)
                                    <span class="badge bg-info">{{ $asignacion->articulo->revista->titulo }}</span>
                                @else
                                    <span class="badge bg-secondary">Sin revista</span>
                                @endif
                            </td>
                            <td>{{ $asignacion->articulo->pag_inicio }}</td>
                            <td>{{ $asignacion->articulo->pag_fin }}</td>
                            <td>
                                <span class="badge bg-primary">Posición: {{ $asignacion->posicion }}</span>
                            </td>
                            <td>
                                <a href="/articulo/{{ $asignacion->articulo->id }}/edit" class="btn btn-outline-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <a href="{{ route('articulo.deactivate', $asignacion->articulo->id) }}" class="btn btn-outline-danger btn-sm" title="Cambiar Estado">
                                    <i class="bi bi-toggle-off"></i> {{ $asignacion->articulo->activo == 1 ? 'Desactivar' : 'Activar' }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle"></i> <strong>No hay artículos</strong> en los que participe este autor
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>