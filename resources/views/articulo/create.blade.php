<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Artículo</title>
    <style>
        .search-container {
            margin-bottom: 15px;
        }
        .search-input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-list {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            width: 300px;
            display: none;
            z-index: 1000;
        }
        .search-list div {
            padding: 8px;
            cursor: pointer;
        }
        .search-list div:hover {
            background-color: #f0f0f0;
        }
        .autor-item {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #eee;
        }
    </style>
</head>
<body>
    <h1>Crear Artículo</h1>

    <form action="/articulo" method="POST" id="articuloForm">
        @csrf

        <div class="search-container">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="search-input" required>
        </div>
        <br>

        <div class="search-container">
            <label for="pag_inicio">Página Inicio</label>
            <input type="number" name="pag_inicio" id="pag_inicio" class="search-input" required>
        </div>
        <br>

        <div class="search-container">
            <label for="pag_fin">Página Fin</label>
            <input type="number" name="pag_fin" id="pag_fin" class="search-input" required>
        </div>
        <br>

        <div class="search-container">
            <label for="revista_search">Revista</label>
            <input type="text" id="revista_search" class="search-input" placeholder="Buscar revista por título..." autocomplete="off">
            <input type="hidden" name="revista_id" id="revista_id" required>
            <div id="revista_list" class="search-list"></div>
        </div>

        <br><br>

        <h3>Autores</h3>

        <div id="contenedor-autores">
            <div class="autor-item">
                <label>Autor 1</label>
                <input type="text" class="autor-search search-input" placeholder="Buscar autor por nombre..." autocomplete="off">
                <input type="hidden" name="autores[]" class="autor-id">
                <div class="autor-list search-list"></div>
                <br><br>
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
        // Datos desde el servidor (pasados por el controlador)
        const revistas = @json($revistas);
        const autores = @json($autores);

        // Función para buscar revistas
        function buscarRevistas() {
            const input = document.getElementById('revista_search');
            const list = document.getElementById('revista_list');
            const searchTerm = input.value.toLowerCase();

            if (searchTerm.length === 0) {
                list.style.display = 'none';
                return;
            }

            const filtered = revistas.filter(revista => 
                revista.titulo.toLowerCase().includes(searchTerm)
            );

            if (filtered.length > 0) {
                list.innerHTML = '';
                filtered.forEach(revista => {
                    const div = document.createElement('div');
                    div.textContent = `${revista.titulo} (ISSN: ${revista.issn}, N°: ${revista.numero})`;
                    div.onclick = () => {
                        document.getElementById('revista_search').value = revista.titulo;
                        document.getElementById('revista_id').value = revista.id;
                        list.style.display = 'none';
                    };
                    list.appendChild(div);
                });
                list.style.display = 'block';
            } else {
                list.style.display = 'none';
            }
        }

        // Función para buscar autores
        function buscarAutores(inputElement, listElement, hiddenElement) {
            const searchTerm = inputElement.value.toLowerCase();

            if (searchTerm.length === 0) {
                listElement.style.display = 'none';
                return;
            }

            const filtered = autores.filter(autor => 
                autor.nombre.toLowerCase().includes(searchTerm) ||
                (autor.correo && autor.correo.toLowerCase().includes(searchTerm))
            );

            if (filtered.length > 0) {
                listElement.innerHTML = '';
                filtered.forEach(autor => {
                    const div = document.createElement('div');
                    div.textContent = `${autor.nombre} - ${autor.correo}`;
                    div.onclick = () => {
                        inputElement.value = autor.nombre;
                        hiddenElement.value = autor.id;
                        listElement.style.display = 'none';
                    };
                    listElement.appendChild(div);
                });
                listElement.style.display = 'block';
            } else {
                listElement.style.display = 'none';
            }
        }

        // Event listeners para revista
        const revistaInput = document.getElementById('revista_search');
        const revistaList = document.getElementById('revista_list');

        revistaInput.addEventListener('input', buscarRevistas);
        revistaInput.addEventListener('blur', () => {
            setTimeout(() => { revistaList.style.display = 'none'; }, 200);
        });

        // Función para agregar autor
        let contadorAutores = 1;

        function agregarAutor() {
            contadorAutores++;

            let contenedor = document.getElementById('contenedor-autores');

            let nuevoAutor = document.createElement('div');
            nuevoAutor.className = 'autor-item';

            nuevoAutor.innerHTML = `
                <br>
                <label>Autor ${contadorAutores}</label>
                <input type="text" class="autor-search search-input" placeholder="Buscar autor por nombre..." autocomplete="off">
                <input type="hidden" name="autores[]" class="autor-id">
                <div class="autor-list search-list"></div>
                <button type="button" onclick="eliminarAutor(this)">Quitar</button>
                <br><br>
            `;

            contenedor.appendChild(nuevoAutor);

            // Agregar event listeners al nuevo autor
            const nuevoInput = nuevoAutor.querySelector('.autor-search');
            const nuevaLista = nuevoAutor.querySelector('.autor-list');
            const nuevoHidden = nuevoAutor.querySelector('.autor-id');

            nuevoInput.addEventListener('input', () => buscarAutores(nuevoInput, nuevaLista, nuevoHidden));
            nuevoInput.addEventListener('blur', () => {
                setTimeout(() => { nuevaLista.style.display = 'none'; }, 200);
            });

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

        // Inicializar event listeners para autores existentes
        document.querySelectorAll('.autor-item').forEach(item => {
            const input = item.querySelector('.autor-search');
            const list = item.querySelector('.autor-list');
            const hidden = item.querySelector('.autor-id');

            if (input && list && hidden) {
                input.addEventListener('input', () => buscarAutores(input, list, hidden));
                input.addEventListener('blur', () => {
                    setTimeout(() => { list.style.display = 'none'; }, 200);
                });
            }
        });
    </script>
</body>
</html>