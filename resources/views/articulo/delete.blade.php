<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Eliminar Artículo</h1>
    
    <form action="/articulo/{{$articuloE->id}}" method="POST">
        @csrf
        @method('DELETE')

        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="{{$articuloE->id}}">

        <label for="titulo_art">Título</label>
        <input type="text" name="titulo_art" id="titulo_art" value="{{$articuloE->titulo_art}}">

        <label for="pag_inicio">Página Inicio</label>
        <input type="text" name="pag_inicio" id="pag_inicio" value="{{$articuloE->pag_inicio}}">

        <label for="pag_fin">Página Fin</label>
        <input type="text" name="pag_fin" id="pag_fin" value="{{$articuloE->pag_fin}}">

        <label for="revista_id">ID Revista</label>
        <input type="text" name="revista_id" id="revista_id" value="{{$articuloE->revista_id}}">

        <label for="autor_id">ID Autor</label>
        <input type="text" name="autor_id" id="autor_id" value="{{$articuloE->autor_id}}">

        <button type="submit">Eliminar Artículo</button>
    </form>
</body>
</html>