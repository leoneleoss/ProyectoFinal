@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Salones</h1>
    <a href="{{ route('salones.create') }}" class="btn btn-primary mb-3">Crear Nuevo Salón</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Lugar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salones as $salon)
                <tr>
                    <td>{{ $salon->salon_id }}</td>
                    <td>{{ $salon->nombre }}</td>
                    <td>{{ $salon->lugar }}</td>
                    <td>
                        <a href="{{ route('salones.edit', $salon) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('salones.destroy', $salon) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este salón?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
