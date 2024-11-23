<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salon;

class SalonController extends Controller
{
    // Listar salones
    public function index()
    {
        $salones = Salon::all();
        return view('salones.index', compact('salones'));
    }

    // Mostrar formulario para crear un salón
    public function create()
    {
        return view('salones.create');
    }

    // Guardar un nuevo salón
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
        ]);

        Salon::create($validated);

        return redirect()->route('salones.index')->with('success', 'Salón creado correctamente.');
    }

    // Mostrar un salón específico (opcional si no necesitas mostrar detalles individuales)
    public function show(Salon $salon)
    {
        return view('salones.show', compact('salon'));
    }

    // Mostrar formulario para editar un salón
    public function edit(Salon $salon)
    {
        return view('salones.edit', compact('salon'));
    }

    // Actualizar un salón existente
    public function update(Request $request, Salon $salon)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
        ]);

        $salon->update($validated);

        return redirect()->route('salones.index')->with('success', 'Salón actualizado correctamente.');
    }

    // Eliminar un salón
    public function destroy(Salon $salon)
    {
        $salon->delete();

        return redirect()->route('salones.index')->with('success', 'Salón eliminado correctamente.');
    }
}
