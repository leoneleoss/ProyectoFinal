@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Salón</h1>
    <form action="{{ route('salones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Salón</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lugar">Lugar</label>
            <input type="text" name="lugar" id="lugar" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
