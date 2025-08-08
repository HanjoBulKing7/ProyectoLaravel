<!DOCTYPE html>
<html>
<head>
    <title>Registrar Empleado</title>
</head>
<body>
    <h1>Registrar Empleado</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
        </div>
        <div>
            <label for="celular">Celular:</label>
            <input type="text" name="celular" required>
        </div>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
</body>
</html>
