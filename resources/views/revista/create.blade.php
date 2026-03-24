<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Revista</h1>

    <form action="/revista" method="POST">
        @csrf
        <label for="ISSN">ISSN</label>
        <input type="text" name="ISSN" id="ISSN">

        <label for="numero_revista">Número de Revista</label>
        <input type="text" name="numero_revista" id="numero_revista">

        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">

        <label for="fecha_lanzamiento">Fecha de Lanzamiento</label>
        <input type="text" name="fecha_lanzamiento" id="fecha_lanzamiento">

        <label for="categoria">Categoría</label>
        <input type="text" name="categoria" id="categoria">

        <button type="submit">Guardar Revista</button>
    </form>
</body>
</html>