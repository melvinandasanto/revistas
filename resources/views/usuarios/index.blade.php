<h2>Lista de Usuarios</h2>

<a href="{{ route('usuarios.create') }}">Crear Usuario</a>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Estado</th>
        <th>Acción</th>
    </tr>

    @foreach($usuarios as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->activo ? 'Activo' : 'Inactivo' }}</td>
        <td>
            <a href="{{ route('usuarios.toggle', $user->id) }}">
                {{ $user->activo ? 'Desactivar' : 'Activar' }}
            </a>
        </td>
    </tr>
    @endforeach
</table>