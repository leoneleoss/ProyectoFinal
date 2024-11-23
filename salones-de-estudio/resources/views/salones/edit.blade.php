@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Salón</h1>
    <form action="{{ route('salones.update', $salon) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre del Salón</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $salon->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="lugar">Lugar</label>
            <input type="text" name="lugar" id="lugar" class="form-control" value="{{ $salon->lugar }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
