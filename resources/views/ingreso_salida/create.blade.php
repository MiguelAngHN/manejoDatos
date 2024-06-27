@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Nuevo Registro</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('ingreso_salida_equipos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="motivo_ingreso">Motivo Ingreso</label>
            <input type="text" name="motivo_ingreso" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_in_ingreso">Fecha Ingreso</label>
            <input type="date" name="fecha_in_ingreso" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_fin_salida">Fecha Salida</label>
            <input type="date" name="fecha_fin_salida" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" name="hora" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="idUser">ID Usuario</label>
            <input type="number" name="idUser" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="idElemento">Elemento 1</label>
            <select name="idElemento" class="form-control">
                <option value="">Seleccione un elemento</option>
                @foreach($elementos as $elemento)
                    <option value="{{ $elemento->id }}">{{ $elemento->marca }}</option>
                @endforeach
            </select>
            <label for="descripcionElemento">Descripción Elemento 1</label>
            <textarea name="descripcionElemento" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="idElemento2">Elemento 2</label>
            <select name="idElemento2" class="form-control">
                <option value="">Seleccione un elemento</option>
                @foreach($elementos as $elemento)
                    <option value="{{ $elemento->id }}">{{ $elemento->marca }}</option>
                @endforeach
            </select>
            <label for="descripcionElemento2">Descripción Elemento 2</label>
            <textarea name="descripcionElemento2" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="idElemento3">Elemento 3</label>
            <select name="idElemento3" class="form-control">
                <option value="">Seleccione un elemento</option>
                @foreach($elementos as $elemento)
                    <option value="{{ $elemento->id }}">{{ $elemento->marca }}</option>
                @endforeach
            </select>
            <label for="descripcionElemento3">Descripción Elemento 3</label>
            <textarea name="descripcionElemento3" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('ingreso_salida_equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>


@endsection
