<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Crear Recorrido</title></head>
<body>
    <h1>Crear Nuevo Recorrido</h1>
    <a href="{{ route('recorridos.index') }}">⬅️ Volver al listado</a>
    <br><br>

    <form action="{{ route('recorridos.store') }}" method="POST">
        @csrf
        <div>
            <label>Selecciona la Visita a la que pertenece:</label><br>
            <select name="visita_id" required>
                <option value="">-- Elige una visita --</option>
                @foreach($visitas as $visita)
                    <option value="{{ $visita->id }}">{{ $visita->titulo }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Título del Recorrido:</label><br>
            <input type="text" name="titulo" required>
        </div>
        <br>
        <div>
            <label>Descripción:</label><br>
            <textarea name="descripcion" rows="4" required></textarea>
        </div>
        <br>
        <div>
            <label><input type="checkbox" name="activo" value="1" checked> Activo</label>
        </div>
        <br>
        <button type="submit">Guardar Recorrido</button>
    </form>
</body>
</html>
