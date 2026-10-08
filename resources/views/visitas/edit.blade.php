<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Visita</title>
</head>
<body>
    <h1>Editar Visita: {{ $visita->titulo }}</h1>
    <a href="{{ route('visitas.index') }}">⬅️ Volver al listado</a>
    <br><br>

    <form action="{{ route('visitas.update', $visita->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Título:</label><br>
            <input type="text" name="titulo" value="{{ $visita->titulo }}" required>
        </div>
        <br>
        <div>
            <label>Descripción:</label><br>
            <textarea name="descripcion" rows="4" required>{{ $visita->descripcion }}</textarea>
        </div>
        <br>
        <div>
            <label>
                <input type="checkbox" name="activo" value="1" {{ $visita->activo ? 'checked' : '' }}> Activo
            </label>
        </div>
        <br>
        <button type="submit">Actualizar Cambios</button>
    </form>
</body>
</html>
