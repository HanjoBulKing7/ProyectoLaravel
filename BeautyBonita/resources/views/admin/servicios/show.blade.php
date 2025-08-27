<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Servicio - Beauty Bonita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/ServiciosAdmin.css') }}">
</head>
<body class="bg-gray-50">
    @include('admin.partials.navbar')

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="mb-6">
            <a href="{{ route('servicios.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center">
                <i data-feather="arrow-left" class="mr-2 w-4 h-4"></i>
                Volver a servicios
            </a>
        </div>

        <div class="card">
            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="text-2xl font-light text-gray-800">Detalle del Servicio</h2>
                <div class="flex space-x-2">
                    <a href="{{ route('servicios.edit', $servicio->id_servicio) }}" class="text-gray-500 hover:text-gray-700">
                        <i data-feather="edit" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Imagen del servicio -->
                    <div class="md:col-span-1">
                        @if($servicio->imagen)
                            <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="{{ $servicio->nombre_servicio }}" class="w-full h-64 object-cover rounded-lg">
                        @else
                            <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                <i data-feather="image" class="text-gray-400 w-16 h-16"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Información principal -->
                    <div class="md:col-span-2">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $servicio->nombre_servicio }}</h3>
                        
                        <div class="mb-4">
                            <span class="px-3 py-1 text-sm rounded-full {{ $servicio->estado == 'activo' ? 'badge-active' : 'badge-inactive' }}">
                                {{ ucfirst($servicio->estado) }}
                            </span>
                            <span class="ml-2 text-sm text-gray-500">Categoría: {{ $servicio->categoria->nombre ?? 'Sin categoría' }}</span>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-sm text-gray-600">Precio:</p>
                                <p class="text-lg font-semibold text-gray-800">${{ number_format($servicio->precio, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Duración:</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $servicio->duracion_minutos }} minutos</p>
                            </div>
                        </div>

                        @if($servicio->descuento)
                            <div class="mb-4">
                                <p class="text-sm text-gray-600">Descuento:</p>
                                <p class="text-lg font-semibold text-green-600">{{ $servicio->descuento }}%</p>
                                <p class="text-sm text-gray-500">
                                    Precio con descuento: ${{ number_format($servicio->precio * (1 - $servicio->descuento / 100), 2) }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Descripción -->
                <div class="mb-6">
                    <h4 class="text-lg font-medium text-gray-800 mb-2">Descripción</h4>
                    <p class="text-gray-600">{{ $servicio->descripcion }}</p>
                </div>

                <!-- Características -->
                @if($servicio->caracteristicas)
                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-800 mb-2">Características</h4>
                        <p class="text-gray-600">{{ $servicio->caracteristicas }}</p>
                    </div>
                @endif

                <!-- Información adicional -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t">
                    <div>
                        <h4 class="text-lg font-medium text-gray-800 mb-2">Información del Servicio</h4>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Creado:</span> 
                                {{ $servicio->created_at->format('d/m/Y H:i') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Actualizado:</span> 
                                {{ $servicio->updated_at->format('d/m/Y H:i') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">ID:</span> 
                                {{ $servicio->id_servicio }}
                            </p>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-medium text-gray-800 mb-2">Acciones</h4>
                        <div class="flex space-x-2">
                            <a href="{{ route('servicios.edit', $servicio->id_servicio) }}" class="btn-primary text-white px-4 py-2 rounded-md text-sm">
                                <i data-feather="edit" class="w-4 h-4 mr-1"></i>
                                Editar
                            </a>
                            <form action="{{ route('servicios.destroy', $servicio->id_servicio) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md text-sm hover:bg-red-700" 
                                        onclick="return confirm('¿Estás seguro de eliminar este servicio?')">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>