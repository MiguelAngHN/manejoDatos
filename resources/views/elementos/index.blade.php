@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Elementos</h1>
    <a href="{{ route('elementos.create') }}" class="btn btn-primary">Añadir Elemento</a>
    <table class="table">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Descripción</th>
                <th>Serial</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($elementos as $elemento)
            <tr>
                <td>{{ $elemento->marca }}</td>
                <td>{{ $elemento->modelo }}</td>
                <td>{{ $elemento->descripcion }}</td>
                <td>{{ $elemento->serial }}</td>
                <td>{{ $elemento->estado->estado }}</td>
                <td>
                    <a href="{{ route('elementos.show', $elemento->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('elementos.edit', $elemento->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('elementos.detalles', $elemento->id) }}" class="btn btn-success">Detalles</a>
                    <form action="{{ route('elementos.destroy', $elemento->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
