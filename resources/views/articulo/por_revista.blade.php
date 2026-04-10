<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos de la Revista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1><i class="bi bi-journal-text"></i> Artículos de la Revista</h1>
                <h5 class="text-muted">{{ $revista->titulo }} (ISSN: {{ $revista->issn }})</h5>
            </div>
            <a href="/revista" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver a Revistas
            </a>
        </div>

        <a href="/articulo/create" class="btn btn-outline-success mb-3">
            <i class="bi bi-plus-circle"></i> Crear Artículo
        </a>

        @if($articulos->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Página Inicio</th>
                            <th>Página Fin</th>
                            <th>Autores</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articulos as $articulo)
                        <tr>
                            <td>{{ $articulo->id }}</td>
                            <td>{{ $articulo->titulo }}</td>
                            <td>{{ $articulo->pag_inicio }}</td>
                            <td>{{ $articulo->pag_fin }}</td>
                            <td>
                                @if($articulo->articuloAutores && $articulo->articuloAutores->count() > 0)
                                    @foreach($articulo->articuloAutores as $detalle)
                                        <div class="small">
                                            <strong>{{ $detalle->autor->nombre }}</strong> 
                                            <span class="badge bg-light text-dark">Pos: {{ $detalle->posicion }}</span>
                                        </div>
                                    @endforeach
                                @else
                                    <span class="text-muted">Sin autores</span>
                                @endif
                            </td>
                            <td>
                                <a href="/articulo/{{ $articulo->id }}/edit" class="btn btn-outline-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <a href="{{ route('articulo.deactivate', $articulo->id) }}" class="btn btn-outline-danger btn-sm" title="Cambiar Estado">
                                    <i class="bi bi-toggle-off"></i> {{ $articulo->activo == 1 ? 'Desactivar' : 'Activar' }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle"></i> <strong>No hay artículos</strong> en esta revista
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>