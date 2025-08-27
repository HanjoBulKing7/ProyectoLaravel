<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Categoría - Beauty Bonita</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Fuente Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Íconos Feather -->
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f5f2;
        }
        .top-nav {
            background-color: #c8c2bc;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .nav-item {
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }
        .nav-item:hover {
            background-color: rgba(255,255,255,0.2);
        }
        .nav-item.active {
            border-bottom-color: #a18a7c;
            font-weight: 500;
        }
        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }
        .btn-primary {
            background-color: #a18a7c;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #8a7568;
        }
        .btn-secondary {
            background-color: #9ca3af;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #6b7280;
        }
        .badge-active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        .badge-inactive {
            background-color: #ffebee;
            color: #c62828;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="top-nav text-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo y nombre -->
                <div class="flex items-center">
                    <a href="{{ url('/admin/home') }}">
                        <img src="{{ asset('iconos/logo blanco.png') }}" alt="Logo" class="h-8 mr-3">
                    </a>
                    <span class="text-lg font-medium"> Admin Categorías</span>
                </div>
                
                <!-- Menú principal -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ url('/admin/home') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="home" class="mr-2 w-5 h-5"></i>
                        Dashboard
                    </a>
                    <a href="{{ url('/admin/servicios') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="scissors" class="mr-2 w-5 h-5"></i>
                        Servicios
                    </a>
                    <a href="{{ route('admin.categoriaservicios.index') }}" class="nav-item active px-4 py-2 flex items-center">
                        <i data-feather="grid" class="mr-2 w-5 h-5"></i>
                        Categorías
                    </a>
                    <a href="{{ url('/admin/citas') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="calendar" class="mr-2 w-5 h-5"></i>
                        Citas
                    </a>
                    <a href="{{ url('/admin/clientes') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="users" class="mr-2 w-5 h-5"></i>
                        Clientes
                    </a>
                    <a href="{{ url('/admin/empleados') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="user-check" class="mr-2 w-5 h-5"></i>
                        Empleados
                    </a>
                </div>
                
                <!-- Usuario y acciones -->
                <div class="flex items-center">
                    <button class="p-2 rounded-full hover:bg-white hover:bg-opacity-20">
                        <i data-feather="bell"></i>
                    </button>
                    <div class="ml-4 flex items-center">
                        <img src="{{ asset('images/cejas.png') }}" alt="Usuario" class="h-8 w-8 rounded-full">
                        <span class="ml-2 text-sm font-medium">Carla</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile menu button -->
    <div class="md:hidden flex justify-between items-center p-4 bg-white border-b">
        <button id="mobile-menu-button" class="text-gray-500">
            <i data-feather="menu"></i>
        </button>
        <img src="{{ asset('iconos/logo.png') }}" alt="Logo" class="h-6">
        <div class="w-6"></div> <!-- Espaciador -->
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ url('/admin/home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="home" class="inline mr-2 w-4 h-4"></i>
                Dashboard
            </a>
            <a href="{{ url('/admin/servicios') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="scissors" class="inline mr-2 w-4 h-4"></i>
                Servicios
            </a>
            <a href="{{ route('admin.categoriaservicios.index') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-gray-100 text-gray-900">
                <i data-feather="grid" class="inline mr-2 w-4 h-4"></i>
                Categorías
            </a>
            <a href="{{ url('/admin/citas') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="calendar" class="inline mr-2 w-4 h-4"></i>
                Citas
            </a>
            <a href="{{ url('/admin/clientes') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="users" class="inline mr-2 w-4 h-4"></i>
                Clientes
            </a>
            <a href="{{ url('/admin/empleados') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="user-check" class="inline mr-2 w-4 h-4"></i>
                Empleados
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-light text-gray-800">Detalles de Categoría</h1>
                <p class="text-gray-500 mt-1">Información completa de la categoría</p>
            </div>
            <div class="flex space-x-2 mt-4 md:mt-0">
                <a href="{{ route('admin.categoriaservicios.edit', $categoria->id_categoria) }}" class="btn-primary text-white px-4 py-2 rounded-md flex items-center">
                    <i data-feather="edit" class="mr-2 w-4 h-4"></i>
                    Editar
                </a>
                <a href="{{ route('admin.categoriaservicios.index') }}" class="btn-secondary text-white px-4 py-2 rounded-md flex items-center">
                    <i data-feather="arrow-left" class="mr-2 w-4 h-4"></i>
                    Volver
                </a>
            </div>
        </div>

        <!-- Tarjeta de detalles -->
        <div class="card overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Imagen -->
                    <div class="md:col-span-1 flex justify-center">
                        @if($categoria->imagen)
                            <img src="{{ asset('storage/' . $categoria->imagen) }}" alt="{{ $categoria->nombre }}" class="h-40 w-40 object-cover rounded-lg">
                        @else
                            <div class="h-40 w-40 bg-gray-200 rounded-lg flex items-center justify-center">
                                <i data-feather="image" class="text-gray-400 h-12 w-12"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Información -->
                    <div class="md:col-span-2">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $categoria->nombre }}</h2>
                        <p class="text-sm text-gray-500 mb-4">{{ $categoria->slug }}</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Estado</p>
                                <span class="px-2 py-1 text-xs rounded-full {{ $categoria->estado == 'activa' ? 'badge-active' : 'badge-inactive' }}">
                                    {{ ucfirst($categoria->estado) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Servicios asociados</p>
                                <p class="text-sm text-gray-900">{{ $categoria->servicios->count() }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-600">Descripción</p>
                            <p class="text-sm text-gray-900 mt-1">{{ $categoria->descripcion ?? 'Sin descripción' }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Fecha de creación</p>
                                <p class="text-sm text-gray-900">{{ $categoria->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Última actualización</p>
                                <p class="text-sm text-gray-900">{{ $categoria->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Servicios asociados -->
        @if($categoria->servicios->count() > 0)
        <div class="mt-6">
            <h2 class="text-xl font-light text-gray-800 mb-4">Servicios en esta categoría</h2>
            <div class="card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duración</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($categoria->servicios as $servicio)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">{{ $servicio->nombre_servicio }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${{ number_format($servicio->precio, 2) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $servicio->duracion_minutos }} min</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $servicio->estado == 'activo' ? 'badge-active' : 'badge-inactive' }}">
                                        {{ ucfirst($servicio->estado) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- JS -->
    <script>
        // Inicializar feather icons
        feather.replace();

        // Manejar el menú móvil
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>