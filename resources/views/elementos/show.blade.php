@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Elemento</h1>
    <table class="table">
        <tr>
            <th>Marca</th>
            <td>{{ $elemento->marca }}</td>
        </tr>
        <tr>
            <th>Modelo</th>
            <td>{{ $elemento->modelo }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $elemento->descripcion }}</td>
        </tr>
        <tr>
            <th>Serial</th>
            <td>{{ $elemento->serial }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $elemento->estado->estado }}</td>
        </tr>
    </table>
    <a href="{{ route('elementos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
