<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Estado de Autor</title>
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
        <h1>Cambiar Estado de Autor</h1>
        
        <div class="info">
            <p><strong>ID:</strong> {{ $autorE->id }}</p>
            <p><strong>Nombre:</strong> {{ $autorE->nombre }}</p>
            <p><strong>Correo:</strong> {{ $autorE->correo }}</p>
            <p><strong>Adscripción:</strong> {{ $autorE->adscripcion }}</p>
            <p><strong>Estado actual:</strong> 
                <span class="{{ $autorE->activo == 1 ? 'estado-activo' : 'estado-inactivo' }}">
                    {{ $autorE->activo == 1 ? 'Activo' : 'Inactivo' }}
                </span>
            </p>
        </div>
        
        <form action="/autor/cambiarEstado/{{$autorE->id}}" method="POST">
            @csrf
            @method('PUT')
            
            <p>¿Está seguro que desea {{ $autorE->activo == 1 ? 'DESACTIVAR' : 'ACTIVAR' }} este autor?</p>
            
            @if($autorE->activo == 1)
                <p style="color: orange;"><strong>Nota:</strong> Al desactivar este autor, no podrá ser seleccionado en nuevos artículos.</p>
            @else
                <p style="color: green;"><strong>Nota:</strong> Al activar este autor, estará disponible para ser seleccionado en artículos.</p>
            @endif
            
            <button type="submit">
                {{ $autorE->activo == 1 ? 'Desactivar' : 'Activar' }}
            </button>
            <a href="/autor">
                <button type="button" class="cancelar">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>