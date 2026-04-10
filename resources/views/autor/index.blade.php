<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="bi bi-person-circle"></i> Lista de Autores</h1>
            <a href="/" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Menú
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <a href="/autor/create" class="btn btn-outline-success mb-3">
            <i class="bi bi-plus-circle"></i> Crear Autor
        </a>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Adscripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultado as $autor)
                    <tr>
                        <td>{{ $autor->id }}</td>
                        <td>{{ $autor->nombre }}</td>
                        <td>{{ $autor->correo }}</td>
                        <td>{{ $autor->adscripcion }}</td>
                        <td>
                            <span class="badge {{ $autor->activo == 1 ? 'bg-success' : 'bg-danger' }}">
                                {{ $autor->activo == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            <a href="/autor/{{ $autor->id }}/edit" class="btn btn-outline-warning btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <a href="/autor/deactivate/{{ $autor->id }}" class="btn btn-outline-danger btn-sm" title="Cambiar Estado">
                                <i class="bi bi-toggle-off"></i> {{ $autor->activo == 1 ? 'Desactivar' : 'Activar' }}
                            </a>
                            @if($autor->activo == 1)
                                <a href="/articulo/autor/{{ $autor->id }}" class="btn btn-outline-info btn-sm" title="Ver Artículos">
                                    <i class="bi bi-file-text"></i> Artículos
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>