@extends('layouts.app')

@section('content')
    <h1>Editar Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $cliente->email }}" required>
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}" required>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <textarea name="direccion">{{ $cliente->direccion }}</textarea>
        </div>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('clientes.index') }}">Volver</a>
@endsection