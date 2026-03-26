<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Revista</h1>

    <form action="/revista/{{$revistaE->id}}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="{{$revistaE->id}}">

        <label for="issn">ISSN</label>
        <input type="text" name="issn" id="issn" value="{{$revistaE->issn}}">

        <label for="numero">Número de Revista</label>
        <input type="text" name="numero" id="numero" value="{{$revistaE->numero}}">

        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{$revistaE->titulo}}">

        <label for="anio_publicacion">Año de Publicación</label>
        <input type="text" name="anio_publicacion" id="anio_publicacion" value="{{$revistaE->anio_publicacion}}">

       

        <button type="submit">Actualizar Revista</button>
    </form>
</body>
</html>