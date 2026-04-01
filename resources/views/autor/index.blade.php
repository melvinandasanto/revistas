<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <style>
        .activo {
            color: green;
            font-weight: bold;
        }
        .inactivo {
            color: red;
            font-weight: bold;
        }
        .success {
            color: green;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid green;
            background-color: #e6ffe6;
        }
        .error {
            color: red;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid red;
            background-color: #ffe6e6;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .estado-boton {
            padding: 5px 10px;
            cursor: pointer;
        }
        .btn-activar {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        .btn-desactivar {
            background-color: #ff9800;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <h1>Lista de Autores</h1>
    
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif
    
    <a href="/autor/create">Crear Autor</a>
    
    <br><br>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Adscripción</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Estado</th>
                <th>Artículos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultado as $autor)
            <tr>
                <td>{{ $autor->id }}</td>
                <td>{{ $autor->nombre }}</td>
                <td>{{ $autor->correo }}</td>
                <td>{{ $autor->adscripcion }}</td>
                <td class="{{ $autor->activo == 1 ? 'activo' : 'inactivo' }}">
                    {{ $autor->activo == 1 ? 'Activo' : 'Inactivo' }}
                </td>
                <td><a href="/autor/{{ $autor->id }}/edit">Editar</a></td>
                <td>
    <a href="/autor/deactivate/{{ $autor->id }}">
        <button class="estado-boton {{ $autor->activo == 1 ? 'btn-desactivar' : 'btn-activar' }}">
            {{ $autor->activo == 1 ? 'Desactivar' : 'Activar' }}
        </button>
    </a>
</td>
                <td>
                    @if($autor->activo == 1)
                        <a href="/autor/porAutor/{{ $autor->id }}">Ver Artículos</a>
                    @else
                        <span style="color: gray;">Desactivado</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <br>
    <a href="/">Volver al Menú</a>
</body>
</html>