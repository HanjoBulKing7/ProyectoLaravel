<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría - Beauty Bonita</title>
    
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
        <div class="mb-6">
            <h1 class="text-2xl font-light text-gray-800">Crear Nueva Categoría</h1>
            <p class="text-gray-500 mt-1">Completa el formulario para agregar una nueva categoría de servicios</p>
        </div>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <div class="card p-6">
            <form action="{{ route('admin.categoriaservicios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombre -->
                    <div class="md:col-span-2">
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre de la categoría *</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300"
                               required>
                    </div>

                    <!-- Descripción -->
                    <div class="md:col-span-2">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">{{ old('descripcion') }}</textarea>
                    </div>

                    <!-- Imagen -->
                    <div class="md:col-span-2">
                        <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
                        <input type="file" name="imagen" id="imagen" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300"
                               accept="image/jpeg,image/png,image/jpg,image/gif">
                        <p class="text-xs text-gray-500 mt-1">Formatos permitidos: jpeg, png, jpg, gif. Tamaño máximo: 2MB</p>
                    </div>

                    <!-- Estado -->
                    <div class="md:col-span-2">
                        <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado *</label>
                        <select name="estado" id="estado" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300" required>
                            <option value="">Seleccionar estado</option>
                            <option value="activa" {{ old('estado') == 'activa' ? 'selected' : '' }}>Activa</option>
                            <option value="inactiva" {{ old('estado') == 'inactiva' ? 'selected' : '' }}>Inactiva</option>
                        </select>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 mt-8">
                    <a href="{{ route('admin.categoriaservicios.index') }}" class="btn-secondary text-white px-4 py-2 rounded-md flex items-center">
                        <i data-feather="arrow-left" class="mr-2 w-4 h-4"></i>
                        Cancelar
                    </a>
                    <button type="submit" class="btn-primary text-white px-4 py-2 rounded-md flex items-center">
                        <i data-feather="save" class="mr-2 w-4 h-4"></i>
                        Guardar Categoría
                    </button>
                </div>
            </form>
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