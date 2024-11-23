@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Reservas</h1>
    <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">Crear Nueva Reserva</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Salón</th>
                <th>Fecha</th>
                <th>Duración (horas)</th>
                <th>Alumno</th>
                <th>Código</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->reserva_id }}</td>
                    <td>{{ $reserva->salon->nombre }}</td>
                    <td>{{ $reserva->fecha_reserva }}</td>
                    <td>{{ $reserva->duracion }}</td>
                    <td>{{ $reserva->nombre_alumno }}</td>
                    <td>{{ $reserva->codigo_alumno }}</td>
                    <td>
                        <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
