<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Artículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .search-container {
            margin-bottom: 15px;
            position: relative;
        }
        .search-input {
            width: 100%;
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
            width: 100%;
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
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success">
                <h2 class="card-title mb-0 text-white">
                    <i class="bi bi-plus-circle"></i> Crear Artículo
                </h2>
            </div>
            
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading">Errores de validación</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/articulo" method="POST" id="articuloForm">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="search-container">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control search-input" value="{{ old('titulo') }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="search-container">
                                <label for="pag_inicio" class="form-label">Página Inicio</label>
                                <input type="number" name="pag_inicio" id="pag_inicio" class="form-control search-input" value="{{ old('pag_inicio') }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="search-container">
                                <label for="pag_fin" class="form-label">Página Fin</label>
                                <input type="number" name="pag_fin" id="pag_fin" class="form-control search-input" value="{{ old('pag_fin') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="search-container">
                        <label for="revista_search" class="form-label">Revista</label>
                        <input type="text" id="revista_search" class="form-control search-input" placeholder="Buscar revista por título..." autocomplete="off">
                        <input type="hidden" name="revista_id" id="revista_id" required>
                        <div id="revista_list" class="search-list"></div>
                    </div>

                    <hr>

                    <h5><i class="bi bi-people"></i> Autores</h5>

                    <div id="contenedor-autores">
                        <div class="autor-item">
                            <label class="form-label"><strong>Autor 1</strong></label>
                            <input type="text" class="autor-search form-control search-input" placeholder="Buscar autor por nombre..." autocomplete="off">
                            <input type="hidden" name="autores[]" class="autor-id">
                            <div class="autor-list search-list"></div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-info btn-sm mb-3" onclick="agregarAutor()">
                        <i class="bi bi-plus"></i> Agregar otro autor
                    </button>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-success">
                            <i class="bi bi-check2"></i> Guardar Artículo
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer">
                <a href="/articulo" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

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
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label mb-0"><strong>Autor ${contadorAutores}</strong></label>
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarAutor(this)">
                        <i class="bi bi-trash"></i> Quitar
                    </button>
                </div>
                <input type="text" class="autor-search form-control search-input mb-2" placeholder="Buscar autor por nombre..." autocomplete="off">
                <input type="hidden" name="autores[]" class="autor-id">
                <div class="autor-list search-list"></div>
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
            boton.closest('.autor-item').remove();
            actualizarEtiquetas();
        }

        function actualizarEtiquetas() {
            let bloques = document.querySelectorAll('.autor-item');
            contadorAutores = bloques.length;

            bloques.forEach(function(bloque, index) {
                let label = bloque.querySelector('label strong');
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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