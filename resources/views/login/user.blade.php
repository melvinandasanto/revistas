<!-- resources/views/user.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuario - Menú Principal</title>
</head>
<body>
    <h1>Bienvenido Usuario</h1>
    <p><a href="{{ route('logout') }}">Cerrar sesión</a></p>

    <h2>Secciones disponibles</h2>
    <ul>
        <li><a href="{{ url('/revista') }}">Revistas</a></li>
        <li><a href="{{ url('/autor') }}">Autores</a></li>
        <li><a href="{{ url('/articulo') }}">Artículos</a></li>
    </ul>
</body>
</html>