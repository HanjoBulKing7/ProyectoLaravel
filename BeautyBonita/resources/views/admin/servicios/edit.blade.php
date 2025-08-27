<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Servicio - Beauty Bonita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/ServiciosAdmin.css') }}">
</head>
<body class="bg-gray-50">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="mb-6">
            <a href="{{ route('admin.servicios.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center">
                <i data-feather="arrow-left" class="mr-2 w-4 h-4"></i>
                Volver a servicios
            </a>
        </div>

        <div class="card">
            <div class="p-6 border-b">
                <h2 class="text-2xl font-light text-gray-800">Editar Servicio: {{ $servicio->nombre_servicio }}</h2>
            </div>

            <form action="{{ route('admin.servicios.update', $servicio->id_servicio) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="nombre_servicio" class="block text-sm font-medium text-gray-700 mb-2">Nombre del Servicio *</label>
                        <input type="text" id="nombre_servicio" name="nombre_servicio" value="{{ old('nombre_servicio', $servicio->nombre_servicio) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300" required>
                        @error('nombre_servicio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="id_categoria" class="block text-sm font-medium text-gray-700 mb-2">Categoría *</label>
                        <select id="id_categoria" name="id_categoria" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300" required>
                            <option value="">Seleccionar categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria', $servicio->id_categoria) == $categoria->id_categoria ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_categoria')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción *</label>
                    <textarea id="descripcion" name="descripcion" rows="3" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label for="precio" class="block text-sm font-medium text-gray-700 mb-2">Precio (MXN) *</label>
                        <input type="number" id="precio" name="precio" step="0.01" value="{{ old('precio', $servicio->precio) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300" required>
                        @error('precio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="duracion_minutos" class="block text-sm font-medium text-gray-700 mb-2">Duración (minutos) *</label>
                        <input type="number" id="duracion_minutos" name="duracion_minutos" value="{{ old('duracion_minutos', $servicio->duracion_minutos) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300" required>
                        @error('duracion_minutos')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="descuento" class="block text-sm font-medium text-gray-700 mb-2">Descuento (%)</label>
                        <input type="number" id="descuento" name="descuento" step="0.01" min="0" max="100" value="{{ old('descuento', $servicio->descuento) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                        @error('descuento')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="caracteristicas" class="block text-sm font-medium text-gray-700 mb-2">Características</label>
                    <textarea id="caracteristicas" name="caracteristicas" rows="2" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">{{ old('caracteristicas', $servicio->caracteristicas) }}</textarea>
                    @error('caracteristicas')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">Estado *</label>
                        <select id="estado" name="estado" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300" required>
                            <option value="activo" {{ old('estado', $servicio->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estado', $servicio->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="imagen" class="block text-sm font-medium text-gray-700 mb-2">Imagen del Servicio</label>
                        <input type="file" id="imagen" name="imagen" accept="image/*" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                        @error('imagen')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Formatos: JPEG, PNG, JPG, GIF. Máx: 2MB</p>
                        
                        @if($servicio->imagen)
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 mb-1">Imagen actual:</p>
                                <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="{{ $servicio->nombre_servicio }}" class="h-20 w-20 object-cover rounded">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-6 border-t">
                    <a href="{{ route('admin.servicios.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancelar
                    </a>
                    <button type="submit" class="btn-primary text-white px-4 py-2 rounded-md">
                        Actualizar Servicio
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>