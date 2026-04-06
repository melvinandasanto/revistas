<!-- resources/views/admin.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - Menú Principal</title>
</head>
<body>
    <h1>Bienvenido Administrador</h1>
    <p><a href="{{ route('logout') }}">Cerrar sesión</a></p>

    <h2>Gestión de Usuarios</h2>
    <p><a href="{{ url('/usuarios') }}">Ver usuarios</a></p>

    <h2>Secciones</h2>
    <ul>
        <li><a href="{{ url('/revista') }}">Revistas</a></li>
        <li><a href="{{ url('/autor') }}">Autores</a></li>
        <li><a href="{{ url('/articulo') }}">Artículos</a></li>
    </ul>
</body>
</html>