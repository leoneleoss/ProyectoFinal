@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>
    <form action="{{ route('reservas.update', $reserva) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="salon_id">Salón</label>
            <select name="salon_id" id="salon_id" class="form-control" required>
                @foreach($salones as $salon)
                    <option value="{{ $salon->salon_id }}" {{ $reserva->salon_id == $salon->salon_id ? 'selected' : '' }}>
                        {{ $salon->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_reserva">Fecha de Reserva</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control" value="{{ $reserva->fecha_reserva }}" required>
        </div>
        <div class="form-group">
            <label for="duracion">Duración (horas)</label>
            <input type="number" name="duracion" id="duracion" class="form-control" value="{{ $reserva->duracion }}" required>
        </div>
        <div class="form-group">
            <label for="nombre_alumno">Nombre del Alumno</label>
            <input type="text" name="nombre_alumno" id="nombre_alumno" class="form-control" value="{{ $reserva->nombre_alumno }}" required>
        </div>
        <div class="form-group">
            <label for="codigo_alumno">Código del Alumno</label>
            <input type="text" name="codigo_alumno" id="codigo_alumno" class="form-control" value="{{ $reserva->codigo_alumno }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
