<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Categorías de Servicios</title>
    
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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Header y botón -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-light text-gray-800">Gestión de Categorías</h1>
                <p class="text-gray-500 mt-1">Administra las categorías de servicios</p>
            </div>
            <a href="{{ route('admin.categoriaservicios.create') }}" class="btn-primary text-white px-4 py-2 rounded-md flex items-center mt-4 md:mt-0">
                <i data-feather="plus" class="mr-2 w-4 h-4"></i>
                Nueva Categoría
            </a>
        </div>

        <!-- Mostrar mensajes de éxito/error -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tarjeta de contenido -->
        <div class="card overflow-hidden">
            <!-- Barra de búsqueda y filtros -->
            <div class="p-4 border-b flex flex-col md:flex-row md:items-center justify-between">
                <div class="relative mb-4 md:mb-0">
                    <i data-feather="search" class="absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" placeholder="Buscar categorías..." class="pl-10 pr-4 py-2 w-full md:w-64 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300">
                </div>
                <div class="flex space-x-2">
                    <select class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300 text-sm">
                        <option>Todos los estados</option>
                        <option>Activas</option>
                        <option>Inactivas</option>
                    </select>
                </div>
            </div>

            <!-- Tabla de categorías -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Servicios</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($categorias as $categoria)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($categoria->imagen)
                                    <img src="{{ asset('storage/' . $categoria->imagen) }}" alt="{{ $categoria->nombre }}" class="h-12 w-12 rounded-full object-cover">
                                @else
                                    <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i data-feather="image" class="text-gray-400"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-900">{{ $categoria->nombre }}</div>
                                <div class="text-sm text-gray-500">{{ $categoria->slug }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 max-w-xs truncate">{{ $categoria->descripcion ?? 'Sin descripción' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $categoria->servicios->count() }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full {{ $categoria->estado == 'activa' ? 'badge-active' : 'badge-inactive' }}">
                                    {{ ucfirst($categoria->estado) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.categoriaservicios.show', $categoria->id_categoria) }}" class="text-gray-500 hover:text-gray-700 mr-3">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                </a>
                                <a href="{{ route('admin.categoriaservicios.edit',  $categoria->id_categoria) }}" class="text-gray-500 hover:text-gray-700 mr-3">
                                    <i data-feather="edit" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.categoriaservicios.destroy', $categoria->id_categoria) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-gray-700" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="bg-gray-50 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Mostrando <span class="font-medium">{{ $categorias->count() }}</span> resultados
                        </p>
                    </div>
                </div>
            </div>
        </div>
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