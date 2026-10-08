<?php

namespace App\Http\Controllers;

use App\Models\Recorrido;
use App\Models\Visita;
use Illuminate\Http\Request;

class RecorridoController extends Controller
{
    public function index()
    {
        // Usamos con('visita') para cargar la relación eficientemente (Eager Loading)
        $recorridos = Recorrido::with('visita')->get();
        return view('recorridos.index', compact('recorridos'));
    }

    public function create()
    {
        // Necesitamos las visitas para el desplegable del formulario
        $visitas = Visita::all();
        return view('recorridos.create', compact('visitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visita_id' => 'required|exists:visitas,id', // Valida que exista en la tabla visitas
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo');

        Recorrido::create($data);

        return redirect()->route('recorridos.index')->with('success', 'Recorrido creado con éxito.');
    }

    public function edit(Recorrido $recorrido)
    {
        $visitas = Visita::all();
        return view('recorridos.edit', compact('recorrido', 'visitas'));
    }

    public function update(Request $request, Recorrido $recorrido)
    {
        $request->validate([
            'visita_id' => 'required|exists:visitas,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo');

        $recorrido->update($data);

        return redirect()->route('recorridos.index')->with('success', 'Recorrido actualizado con éxito.');
    }

    public function destroy(Recorrido $recorrido)
    {
        $recorrido->delete();
        return redirect()->route('recorridos.index')->with('success', 'Recorrido eliminado con éxito.');
    }
}
