@extends('layouts.app')

@section('content')
    <h1>Detalles del Cliente</h1>

    <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>

    <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    <a href="{{ route('clientes.index') }}">Volver</a>
@endsection