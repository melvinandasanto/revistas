<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desactivar Autor</title>
</head>
<body>

<h1>Desactivar Autor</h1>

<form action="/autor/cambiarEstado/{{$autorE->id}}" method="POST">

    @csrf
    @method('PUT')

    <label for="id">ID</label>
    <input type="text" name="id" value="{{$autorE->id}}" readonly>

    <br>

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{$autorE->nombre}}" readonly>

    <br>

    <label for="correo">Correo</label>
    <input type="text" name="correo" value="{{$autorE->correo}}" readonly>

    <br>

    <label for="estado">Estado actual</label>
    <input type="text" value="{{$autorE->activo == 1 ? 'Activo' : 'Inactivo'}}" readonly>

    <br><br>

    <button type="submit">Cambiar Estado</button>

</form>

</body>
</html>