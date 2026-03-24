<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Eliminar Autor</h1>
    
    <form action="/autor/{{$autorE->id}}" method="POST">
        @csrf
        @method('DELETE')

        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="{{$autorE->id}}">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{$autorE->nombre}}">

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" value="{{$autorE->apellido}}">

        <label for="correo">Correo</label>
        <input type="text" name="correo" id="correo" value="{{$autorE->correo}}">

        <button type="submit">Eliminar Autor</button>
    </form>
</body>
</html>