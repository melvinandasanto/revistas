<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Artículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2 class="mb-4">📄 Mis Artículos</h2>

    @if(empty($articulos) || $articulos->count() == 0)
        <div class="alert alert-warning">
            No tienes artículos registrados.
        </div>
    @endif

    <div class="row">
        @foreach($articulos as $articulo)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="card-title">{{ $articulo->titulo }}</h5>

                        <p class="card-text">
                            <strong>Páginas:</strong>
                            {{ $articulo->pag_inicio }} - {{ $articulo->pag_fin }}
                        </p>

                        <!-- BOTÓN ELIMINAR -->
                        <form action="{{ route('articulo.destroy', $articulo->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn btn-danger btn-sm"
                              ►  onclick="return confirm('¿Seguro que quieres eliminar este artículo?')">
                                🗑 Eliminar artículo
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>