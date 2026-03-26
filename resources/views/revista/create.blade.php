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
        <label for="issn">ISSN</label>
        <input type="text" name="issn" id="issn">

        <label for="numero">Número de Revista</label>
        <input type="text" name="numero" id="numero">

        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">

        <label for="anio_publicacion">Año de Publicación</label>
        <input type="text" name="anio_publicacion" id="anio_publicacion">

        

        <button type="submit">Guardar Revista</button>
    </form>
</body>
</html>