@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Elemento</h1>
    <form action="{{ route('elementos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="serial">Serial:</label>
            <input type="text" class="form-control" id="serial" name="serial" required>
        </div>
        <div class="form-group">
            <label for="estado_id">Estado:</label>
            <select class="form-control" id="estado_id" name="estado_id" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
