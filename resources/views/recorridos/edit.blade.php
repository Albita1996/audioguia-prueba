<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Recorrido</title>
</head>
<body>
    <h1>Editar Recorrido: {{ $recorrido->titulo }}</h1>
    <a href="{{ route('recorridos.index') }}">⬅️ Volver al listado</a>
    <br><br>

    <form action="{{ route('recorridos.update', $recorrido->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label>Visita Asociada:</label><br>
            <select name="visita_id" required>
                @foreach($visitas as $visita)
                    <!-- Marcamos como 'selected' la visita que ya tenía guardada este recorrido -->
                    <option value="{{ $visita->id }}" {{ $recorrido->visita_id == $visita->id ? 'selected' : '' }}>
                        {{ $visita->titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        
        <div>
            <label>Título del Recorrido:</label><br>
            <input type="text" name="titulo" value="{{ $recorrido->titulo }}" required>
        </div>
        <br>
        
        <div>
            <label>Descripción:</label><br>
            <textarea name="descripcion" rows="4" required>{{ $recorrido->descripcion }}</textarea>
        </div>
        <br>
        
        <div>
            <label>
                <input type="checkbox" name="activo" value="1" {{ $recorrido->activo ? 'checked' : '' }}> Activo
            </label>
        </div>
        <br>
        
        <button type="submit">Actualizar Cambios</button>
    </form>
</body>
</html>

