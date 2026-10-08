<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Visitas</title>
</head>
<body>
    <h1>Lista de Visitas</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('visitas.create') }}">➕ Crear Nueva Visita</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitas as $visita)
                <tr>
                    <td>{{ $visita->id }}</td>
                    <td>{{ $visita->titulo }}</td>
                    <td>{{ $visita->descripcion }}</td>
                    <td>{{ $visita->activo ? '✅ Activo' : '❌ Inactivo' }}</td>
                    <td>
                        <a href="{{ route('visitas.edit', $visita->id) }}">✏️ Editar</a>
                        
                        <!-- Formulario para borrar -->
                        <form action="{{ route('visitas.destroy', $visita->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
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
