<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
    // 1. Listar todas las visitas
    public function index()
    {
        $visitas = Visita::all();
        return view('visitas.index', compact('visitas'));
    }

    // 2. Mostrar el formulario para crear una nueva visita
    public function create()
    {
        return view('visitas.create');
    }

    // 3. Guardar la nueva visita en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        // Si el checkbox de 'activo' no se marca, mandamos false
        $data = $request->all();
        $data['activo'] = $request->has('activo');

        Visita::create($data);

        return redirect()->route('visitas.index')->with('success', 'Visita creada correctamente.');
    }

    // 4. Mostrar una visita en específico (opcional para tu diseño)
    public function show(Visita $visita)
    {
        return view('visitas.show', compact('visita'));
    }

    // 5. Mostrar el formulario para editar una visita existente
    public function edit(Visita $visita)
    {
        return view('visitas.edit', compact('visita'));
    }

    // 6. Actualizar la visita en la base de datos
    public function update(Request $request, Visita $visita)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo');

        $visita->update($data);

        return redirect()->route('visitas.index')->with('success', 'Visita actualizada correctamente.');
    }

    // 7. Eliminar la visita de la base de datos
    public function destroy(Visita $visita)
    {
        $visita->delete();
        return redirect()->route('visitas.index')->with('success', 'Visita eliminada correctamente.');
    }
}
