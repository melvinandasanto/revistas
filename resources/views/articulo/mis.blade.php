<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Artículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-book"></i> Mis Artículos</h2>
            <a href="{{ route('menu') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Menú
            </a>
        </div>

        @if($articulos->isEmpty())
            <div class="alert alert-info" role="alert">
                <i class="bi bi-info-circle"></i> No tienes artículos registrados en el sistema.
            </div>
        @else
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Título</th>
                        <th>Revista</th>
                        <th>Páginas</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                        <td>
                            <strong>{{ $articulo->titulo }}</strong>
                        </td>
                        <td>
                            @if($articulo->revista)
                                <span class="badge bg-primary">{{ $articulo->revista->nombre }}</span>
                            @else
                                <span class="badge bg-secondary">Sin revista</span>
                            @endif
                        </td>
                        <td>
                            {{ $articulo->pag_inicio }} - {{ $articulo->pag_fin }}
                        </td>
                        <td>
                            <span class="badge {{ $articulo->activo ? 'bg-success' : 'bg-danger' }}">
                                {{ $articulo->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('articulo.show', $articulo->id) }}" class="btn btn-outline-info btn-sm" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('articulo.edit', $articulo->id) }}" class="btn btn-outline-warning btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
