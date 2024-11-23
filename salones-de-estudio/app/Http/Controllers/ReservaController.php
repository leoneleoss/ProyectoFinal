<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Salon;

class ReservaController extends Controller
{
    // Listar reservas
    public function index()
    {
        $reservas = Reserva::with('salon')->get();
        return view('reservas.index', compact('reservas'));
    }

    // Mostrar formulario para crear una reserva
    public function create()
    {
        $salones = Salon::all(); // Para seleccionar salones en el formulario
        return view('reservas.create', compact('salones'));
    }

    // Guardar una nueva reserva
    public function store(Request $request)
    {
        $validated = $request->validate([
            'salon_id' => 'required|exists:salones,salon_id',
            'fecha_reserva' => 'required|date',
            'duracion' => 'required|integer|min:1',
            'nombre_alumno' => 'required|string|max:255',
            'codigo_alumno' => 'required|string|max:255',
        ]);

        Reserva::create($validated);

        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente.');
    }

    // Mostrar una reserva específica (opcional)
    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    // Mostrar formulario para editar una reserva
    public function edit(Reserva $reserva)
    {
        $salones = Salon::all();
        return view('reservas.edit', compact('reserva', 'salones'));
    }

    // Actualizar una reserva existente
    public function update(Request $request, Reserva $reserva)
    {
        $validated = $request->validate([
            'salon_id' => 'required|exists:salones,salon_id',
            'fecha_reserva' => 'required|date',
            'duracion' => 'required|integer|min:1',
            'nombre_alumno' => 'required|string|max:255',
            'codigo_alumno' => 'required|string|max:255',
        ]);

        $reserva->update($validated);

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    // Eliminar una reserva
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente.');
    }
}
