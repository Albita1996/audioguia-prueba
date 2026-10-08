<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Listado de Recorridos</title></head>
<body>
    <h1>Lista de Recorridos</h1>
    @if(session('success')) <p style="color: green;">{{ session('success') }}</p> @endif
    <a href="{{ route('recorridos.create') }}">➕ Crear Nuevo Recorrido</a> | 
    <a href="{{ route('visitas.index') }}">👁️ Ver Visitas</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Visita Asociada</th>
                <th>Título Recorrido</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recorridos as $recorrido)
                <tr>
                    <td>{{ $recorrido->id }}</td>
                    <!-- Accedemos al modelo relacionado gracias a Eloquent -->
                    <td><strong>{{ $recorrido->visita->titulo ?? 'Sin visita' }}</strong></td>
                    <td>{{ $recorrido->titulo }}</td>
                    <td>{{ $recorrido->descripcion }}</td>
                    <td>{{ $recorrido->activo ? '✅ Activo' : '❌ Inactivo' }}</td>
                    <td>
                        <a href="{{ route('recorridos.edit', $recorrido->id) }}">✏️ Editar</a>
                        <form action="{{ route('recorridos.destroy', $recorrido->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro?')">🗑️ Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-4">
    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-xs font-semibold uppercase tracking-widest rounded-md transition ease-in-out duration-150">
        ⬅️ Volver al Dashboard
    </a>
</div>

</body>
</html>
