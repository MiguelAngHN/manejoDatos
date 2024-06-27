@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Ingreso y Salida de Equipos</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('ingreso_salida_equipos.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Motivo Ingreso</th>
                <th>Fecha Ingreso</th>
                <th>Fecha Salida</th>
                <th>Hora</th>
                <th>ID Usuario</th>
                <th>Elemento 1</th>
                <th>Descripción Elemento 1</th>
                <th>Elemento 2</th>
                <th>Descripción Elemento 2</th>
                <th>Elemento 3</th>
                <th>Descripción Elemento 3</th>
                <th>Ver PDF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingresos_salidas as $ingreso_salida)
                <tr>
                    <td>{{ $ingreso_salida->id }}</td>
                    <td>{{ $ingreso_salida->motivo_ingreso }}</td>
                    <td>{{ $ingreso_salida->fecha_in_ingreso }}</td>
                    <td>{{ $ingreso_salida->fecha_fin_salida }}</td>
                    <td>{{ $ingreso_salida->hora }}</td>
                    <td>{{ $ingreso_salida->idUser }}</td>
                    <td>{{ $ingreso_salida->idElemento }}</td>
                    <td>{{ $ingreso_salida->descripcionElemento }}</td>
                    <td>{{ $ingreso_salida->idElemento2 }}</td>
                    <td>{{ $ingreso_salida->descripcionElemento2 }}</td>
                    <td>{{ $ingreso_salida->idElemento3 }}</td>
                    <td>{{ $ingreso_salida->descripcionElemento3 }}</td>
                    <td>
                        <a href="{{ route('elemento.viewpdf', $ingreso_salida->id) }}" class="btn btn-info btn-sm">Ver PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

