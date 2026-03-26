<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>
</head>
<body>
    <h1>Editar Artículo</h1>

    <form action="/articulo/{{$articuloE->id}}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="{{$articuloE->id}}" readonly>
        <br><br>

        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{$articuloE->titulo}}">
        <br><br>

        <label for="pag_inicio">Página Inicio</label>
        <input type="number" name="pag_inicio" id="pag_inicio" value="{{$articuloE->pag_inicio}}">
        <br><br>

        <label for="pag_fin">Página Fin</label>
        <input type="number" name="pag_fin" id="pag_fin" value="{{$articuloE->pag_fin}}">
        <br><br>

        <label for="revista_id">Revista</label>
        <select name="revista_id" id="revista_id">
            <option value="">Seleccione una revista</option>
            @foreach($revistas as $revista)
                <option value="{{ $revista->id }}"
                    {{ $articuloE->revista_id == $revista->id ? 'selected' : '' }}>
                    {{ $revista->titulo }}
                </option>
            @endforeach
        </select>

        <br><br>

        <h3>Autores</h3>

        <div id="contenedor-autores">
            @if(count($asignaciones) > 0)
                @foreach($asignaciones as $index => $asignacion)
                    <div class="autor-item">
                        <label>Autor {{ $index + 1 }}</label>
                        <select name="autores[]" class="autor-select">
                            <option value="">Seleccione un autor</option>
                            @foreach($autores as $autor)
                                <option value="{{ $autor->id }}"
                                    {{ $asignacion->autor_id == $autor->id ? 'selected' : '' }}>
                                    {{ $autor->nombre }}
                                </option>
                            @endforeach
                        </select>

                        @if($index > 0)
                            <button type="button" onclick="eliminarAutor(this)">Quitar</button>
                        @endif
                        <br><br>
                    </div>
                @endforeach
            @else
                <div class="autor-item">
                    <label>Autor 1</label>
                    <select name="autores[]" class="autor-select">
                        <option value="">Seleccione un autor</option>
                        @foreach($autores as $autor)
                            <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                        @endforeach
                    </select>
                    <br><br>
                </div>
            @endif
        </div>

        <button type="button" onclick="agregarAutor()">Agregar otro autor</button>

        <br><br>
        <button type="submit">Actualizar Artículo</button>
    </form>

    <br>
    <a href="/articulo">Volver</a>

    <script>
        let contadorAutores = document.querySelectorAll('.autor-item').length;

        function agregarAutor() {
            contadorAutores++;

            let contenedor = document.getElementById('contenedor-autores');

            let nuevoAutor = document.createElement('div');
            nuevoAutor.className = 'autor-item';

            nuevoAutor.innerHTML = `
                <label>Autor ${contadorAutores}</label>
                <select name="autores[]" class="autor-select">
                    <option value="">Seleccione un autor</option>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                    @endforeach
                </select>
                <button type="button" onclick="eliminarAutor(this)">Quitar</button>
                <br><br>
            `;

            contenedor.appendChild(nuevoAutor);
            actualizarEtiquetas();
        }

        function eliminarAutor(boton) {
            boton.parentElement.remove();
            actualizarEtiquetas();
        }

        function actualizarEtiquetas() {
            let bloques = document.querySelectorAll('.autor-item');
            contadorAutores = bloques.length;

            bloques.forEach(function(bloque, index) {
                let label = bloque.querySelector('label');
                label.textContent = 'Autor ' + (index + 1);
            });
        }
    </script>
</body>
</html>