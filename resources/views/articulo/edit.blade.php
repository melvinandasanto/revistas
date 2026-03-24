<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Artículo</h1>

    <form action="/articulo/{{$articuloE->id}}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="{{$articuloE->id}}">

        <label for="titulo_art">Título</label>
        <input type="text" name="titulo_art" id="titulo_art" value="{{$articuloE->titulo_art}}">

        <label for="pag_inicio">Página Inicio</label>
        <input type="text" name="pag_inicio" id="pag_inicio" value="{{$articuloE->pag_inicio}}">

        <label for="pag_fin">Página Fin</label>
        <input type="text" name="pag_fin" id="pag_fin" value="{{$articuloE->pag_fin}}">

        <label for="revista_id">Revista</label>
        <select name="revista_id" id="revista_id">
            <option value="">-- Seleccione Revista --</option>
            @foreach($revistas as $revista)
            <option value="{{ $revista->id }}" {{ $articuloE->revista_id == $revista->id ? 'selected' : '' }}>
                {{ $revista->titulo }} (ISSN: {{ $revista->ISSN }})
            </option>
            @endforeach
        </select>

        <label for="autor_id">Autor</label>
        <select name="autor_id" id="autor_id">
            <option value="">-- Seleccione Autor --</option>
            @foreach($autores as $autor)
            <option value="{{ $autor->id }}" {{ $articuloE->autor_id == $autor->id ? 'selected' : '' }}>
                {{ $autor->nombre }} {{ $autor->apellido }}
            </option>
            @endforeach
        </select>

        <button type="submit">Actualizar Artículo</button>
    </form>
</body>
</html>