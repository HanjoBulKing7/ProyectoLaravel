@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="{{ old('telefono') }}" required>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <textarea name="direccion">{{ old('direccion') }}</textarea>
        </div>
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('clientes.index') }}">Volver</a>
@endsection