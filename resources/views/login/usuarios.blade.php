<!-- resources/views/usuarios.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <p><a href="{{ url('/admin') }}">Volver al menú</a> | <a href="{{ route('logout') }}">Cerrar sesión</a></p>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->roles as $role)
                    {{ $role->name }}
                @endforeach
            </td>
            <td>{{ $user->active ? 'Sí' : 'No' }}</td>
            <td>
                <form action="{{ url('/toggle/' . $user->id) }}" method="POST">
                    @csrf
                    <button type="submit">Toggle</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>