<h2>Crear Usuario</h2>

<form method="POST" action="{{ route('usuarios.store') }}">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Guardar</button>
</form>