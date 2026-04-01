<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Estado de Revista</title>
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        .info {
            background-color: #f0f0f0;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .estado-activo {
            color: green;
            font-weight: bold;
        }
        .estado-inactivo {
            color: red;
            font-weight: bold;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .cancelar {
            background-color: #f44336;
            margin-left: 10px;
        }
        .cancelar:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cambiar Estado de Revista</h1>
        
        <div class="info">
            <p><strong>ID:</strong> {{ $revistaE->id }}</p>
            <p><strong>ISSN:</strong> {{ $revistaE->issn }}</p>
            <p><strong>Número:</strong> {{ $revistaE->numero }}</p>
            <p><strong>Título:</strong> {{ $revistaE->titulo }}</p>
            <p><strong>Año de Publicación:</strong> {{ $revistaE->anio_publicacion }}</p>
            <p><strong>Estado actual:</strong> 
                <span class="{{ $revistaE->activo == 1 ? 'estado-activo' : 'estado-inactivo' }}">
                    {{ $revistaE->activo == 1 ? 'Activa' : 'Inactiva' }}
                </span>
            </p>
        </div>
        
        <form action="/revista/cambiarEstado/{{$revistaE->id}}" method="POST">
            @csrf
            @method('PUT')
            
            <p>¿Está seguro que desea {{ $revistaE->activo == 1 ? 'DESACTIVAR' : 'ACTIVAR' }} esta revista?</p>
            
            @if($revistaE->activo == 1)
                <p style="color: orange;"><strong>Nota:</strong> Al desactivar esta revista, no podrá ser seleccionada en nuevos artículos.</p>
            @else
                <p style="color: green;"><strong>Nota:</strong> Al activar esta revista, estará disponible para ser seleccionada en artículos.</p>
            @endif
            
            <button type="submit">
                {{ $revistaE->activo == 1 ? 'Desactivar' : 'Activar' }}
            </button>
            <a href="/revista">
                <button type="button" class="cancelar">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>