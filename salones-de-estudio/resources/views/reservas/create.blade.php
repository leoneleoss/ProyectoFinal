@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Reserva</h1>
    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="salon_id">Salón</label>
            <select name="salon_id" id="salon_id" class="form-control" required>
                <option value="">Seleccione un salón</option>
                @foreach($salones as $salon)
                    <option value="{{ $salon->salon_id }}">{{ $salon->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_reserva">Fecha de Reserva</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="duracion">Duración (horas)</label>
            <input type="number" name="duracion" id="duracion" class="form-control" min="1" required>
        </div>
        <div class="form-group">
            <label for="nombre_alumno">Nombre del Alumno</label>
            <input type="text" name="nombre_alumno" id="nombre_alumno" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="codigo_alumno">Código del Alumno</label>
            <input type="text" name="codigo_alumno" id="codigo_alumno" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
