<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Autor</h1>

    <form action="/autor" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido">

        <label for="correo">Correo</label>
        <input type="text" name="correo" id="correo">

        <button type="submit">Guardar Autor</button>
    </form>
</body>
</html>