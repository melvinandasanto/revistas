<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Artículo</title>
</head>
<body>
    <h1>Crear Artículo</h1>

    <form action="/articulo" method="POST">
        @csrf

        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">
        <br><br>

        <label for="pag_inicio">Página Inicio</label>
        <input type="number" name="pag_inicio" id="pag_inicio">
        <br><br>

        <label for="pag_fin">Página Fin</label>
        <input type="number" name="pag_fin" id="pag_fin">
        <br><br>

        <label for="revista_id">Revista</label>
        <select name="revista_id" id="revista_id">
            <option value="">Seleccione una revista</option>
            @foreach($revistas as $revista)
                <option value="{{ $revista->id }}">{{ $revista->titulo }}</option>
            @endforeach
        </select>

        <br><br>

        <h3>Autores</h3>

        <div id="contenedor-autores">
            <div class="autor-item">
                <label>Autor 1</label>
                <select name="autores[]" class="autor-select">
                    <option value="">Seleccione un autor</option>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>
        <button type="button" onclick="agregarAutor()">Agregar otro autor</button>

        <br><br>
        <button type="submit">Guardar Artículo</button>
    </form>

    <br>
    <a href="/articulo">Volver</a>

    <script>
        let contadorAutores = 1;

        function agregarAutor() {
            contadorAutores++;

            let contenedor = document.getElementById('contenedor-autores');

            let nuevoAutor = document.createElement('div');
            nuevoAutor.className = 'autor-item';

            nuevoAutor.innerHTML = `
                <br>
                <label>Autor ${contadorAutores}</label>
                <select name="autores[]" class="autor-select">
                    <option value="">Seleccione un autor</option>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                    @endforeach
                </select>
                <button type="button" onclick="eliminarAutor(this)">Quitar</button>
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