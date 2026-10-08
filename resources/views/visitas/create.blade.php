<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Visita</title>
</head>
<body>
    <h1>Crear Nueva Visita</h1>
    <a href="{{ route('visitas.index') }}">⬅️ Volver al listado</a>
    <br><br>

    <form action="{{ route('visitas.store') }}" method="POST">
        @csrf
        <div>
            <label>Título:</label><br>
            <input type="text" name="titulo" required>
        </div>
        <br>
        <div>
            <label>Descripción:</label><br>
            <textarea name="descripcion" rows="4" required></textarea>
        </div>
        <br>
        <div>
            <label>
                <input type="checkbox" name="activo" value="1" checked> Activo
            </label>
        </div>
        <br>
        <button type="submit">Guardar Visita</button>
    </form>
</body>
</html>
