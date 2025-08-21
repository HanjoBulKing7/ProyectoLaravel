<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Beauty Bonita</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Fuente Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Íconos Feather -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/CitasAdmin.css') }}">
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="top-nav text-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo y nombre -->
                <div class="flex items-center">
                    <img src="{{ asset('iconos/logo blanco.png') }}" alt="Logo" class="h-8 mr-3">
                    <span class="text-lg font-medium"> Admin Citas </span>
                </div>
                
                <!-- Menú principal -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ url('/admin') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="home" class="mr-2 w-5 h-5"></i>
                        Dashboard
                    </a>
                    <a href="{{ url('/serviciosadmin') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="scissors" class="mr-2 w-5 h-5"></i>
                        Servicios
                    </a>
                    <a href="{{ url('/citasadmin') }}" class="nav-item active px-4 py-2 flex items-center">
                        <i data-feather="calendar" class="mr-2 w-5 h-5"></i>
                        Citas
                    </a>
                    <a href="{{ url('/clientesadmin') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="users" class="mr-2 w-5 h-5"></i>
                        Clientes
                    </a>
                    <a href="{{ url('/empleadosadmin') }}" class="nav-item px-4 py-2 flex items-center">
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
            <a href="{{ url('/admin') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="home" class="inline mr-2 w-4 h-4"></i>
                Dashboard
            </a>
            <a href="{{ url('/serviciosadmin') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="scissors" class="inline mr-2 w-4 h-4"></i>
                Servicios
            </a>
            <a href="{{ url('/citasadmin') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-gray-100 text-gray-900">
                <i data-feather="calendar" class="inline mr-2 w-4 h-4"></i>
                Citas
            </a>
            <a href="{{ url('/clientesadmin') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="users" class="inline mr-2 w-4 h-4"></i>
                Clientes
            </a>
            <a href="{{ url('/empleadosadmin') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
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
                <h1 class="text-2xl font-light text-gray-800">Gestión de Citas</h1>
                <p class="text-gray-500 mt-1">Administra las citas programadas en tu salón</p>
            </div>
            <div class="flex space-x-3 mt-4 md:mt-0">
                <button onclick="openCalendarView()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 flex items-center">
                    <i data-feather="calendar" class="mr-2 w-4 h-4"></i>
                    Vista Calendario
                </button>
                <button onclick="openModal()" class="btn-primary text-white px-4 py-2 rounded-md flex items-center">
                    <i data-feather="plus" class="mr-2 w-4 h-4"></i>
                    Nueva Cita
                </button>
            </div>
        </div>

        <!-- Filtros y búsqueda -->
        <div class="card mb-6 p-4">
            <div class="flex flex-col md:flex-row md:items-center justify-between space-y-4 md:space-y-0">
                <div class="relative w-full md:w-64">
                    <i data-feather="search" class="absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" placeholder="Buscar citas..." class="pl-10 pr-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300">
                </div>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                    <select class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300 text-sm">
                        <option>Hoy</option>
                        <option>Esta semana</option>
                        <option>Este mes</option>
                        <option>Personalizado</option>
                    </select>
                    <select class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300 text-sm">
                        <option>Todos los estados</option>
                        <option>Confirmadas</option>
                        <option>Pendientes</option>
                        <option>Canceladas</option>
                        <option>Completadas</option>
                    </select>
                    <select class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300 text-sm">
                        <option>Todos los empleados</option>
                        <option>María González</option>
                        <option>Carlos Martínez</option>
                        <option>Ana López</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Vista de citas en cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Cita 1 -->
            <div class="card p-5 hover:shadow-md transition-shadow duration-200">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <span class="badge-confirmed px-2 py-1 text-xs rounded-full">Confirmada</span>
                        <h3 class="text-lg font-medium text-gray-800 mt-2">Maquillaje profesional</h3>
                    </div>
                    <div class="text-right">
                        <span class="text-sm text-gray-500">#C-00123</span>
                        <div class="text-xs text-gray-400 mt-1">10:00 - 11:00</div>
                    </div>
                </div>
                
                <div class="flex items-center mb-3">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('images/cejas.png') }}" alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Laura Sánchez</p>
                        <p class="text-xs text-gray-500">55 1234 5678</p>
                    </div>
                </div>
                
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('empleadas/carla.jpg') }}" alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">María González</p>
                        <p class="text-xs text-gray-500">Estilista</p>
                    </div>
                </div>
                
                <div class="flex justify-between items-center text-sm">
                    <div class="text-gray-700">$450.00</div>
                    <div class="flex space-x-2">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i data-feather="edit" class="w-4 h-4"></i>
                        </button>
                        <button class="text-gray-500 hover:text-gray-700">
                            <i data-feather="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Cita 2 -->
            <div class="card p-5 hover:shadow-md transition-shadow duration-200">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <span class="badge-pending px-2 py-1 text-xs rounded-full">Pendiente</span>
                        <h3 class="text-lg font-medium text-gray-800 mt-2">Manicure básico</h3>
                    </div>
                    <div class="text-right">
                        <span class="text-sm text-gray-500">#C-00124</span>
                        <div class="text-xs text-gray-400 mt-1">11:30 - 12:00</div>
                    </div>
                </div>
                
                <div class="flex items-center mb-3">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('images/pestañas3.png') }}" alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Ana Rodríguez</p>
                        <p class="text-xs text-gray-500">55 8765 4321</p>
                    </div>
                </div>
                
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('empleadas/sofia.jpg') }}" alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Ana López</p>
                        <p class="text-xs text-gray-500">Manicurista</p>
                    </div>
                </div>
                
                <div class="flex justify-between items-center text-sm">
                    <div class="text-gray-700">$180.00</div>
                    <div class="flex space-x-2">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i data-feather="edit" class="w-4 h-4"></i>
                        </button>
                        <button class="text-gray-500 hover:text-gray-700">
                            <i data-feather="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Cita 3 -->
            <div class="card p-5 hover:shadow-md transition-shadow duration-200">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <span class="badge-completed px-2 py-1 text-xs rounded-full">Completada</span>
                        <h3 class="text-lg font-medium text-gray-800 mt-2">Corte de cabello</h3>
                    </div>
                    <div class="text-right">
                        <span class="text-sm text-gray-500">#C-00122</span>
                        <div class="text-xs text-gray-400 mt-1">09:00 - 09:45</div>
                    </div>
                </div>
                
                <div class="flex items-center mb-3">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('images/pestañas.png') }}" alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Carla Méndez</p>
                        <p class="text-xs text-gray-500">55 9876 5432</p>
                    </div>
                </div>
                
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('empleadas/maria.jpg') }}" alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Maria Martínez</p>
                        <p class="text-xs text-gray-500">Barbero</p>
                    </div>
                </div>
                
                <div class="flex justify-between items-center text-sm">
                    <div class="text-gray-700">$250.00</div>
                    <div class="flex space-x-2">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i data-feather="edit" class="w-4 h-4"></i>
                        </button>
                        <button class="text-gray-500 hover:text-gray-700">
                            <i data-feather="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Paginación -->
        <div class="mt-6">
            <div class="card px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">3</span> de <span class="font-medium">12</span> resultados
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Anterior</span>
                                <i data-feather="chevron-left" class="h-4 w-4"></i>
                            </a>
                            <a href="#" aria-current="page" class="z-10 bg-gray-100 border-gray-300 text-gray-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                1
                            </a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                2
                            </a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                3
                            </a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Siguiente</span>
                                <i data-feather="chevron-right" class="h-4 w-4"></i>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar/editar cita -->
    <div id="appointmentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-medium text-gray-800">Agregar Nueva Cita</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <i data-feather="x" class="w-5 h-5"></i>
                </button>
            </div>
            
            <form class="p-4">
                <div class="mb-4">
                    <label for="cliente" class="block text-sm font-medium text-gray-700 mb-1">Cliente</label>
                    <select id="cliente" name="cliente" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                        <option value="">Seleccione un cliente</option>
                        <option value="1">Laura Sánchez (55 1234 5678)</option>
                        <option value="2">Ana Rodríguez (55 8765 4321)</option>
                        <option value="3">Carlos Méndez (55 9876 5432)</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="servicio" class="block text-sm font-medium text-gray-700 mb-1">Servicio</label>
                    <select id="servicio" name="servicio" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                        <option value="">Seleccione un servicio</option>
                        <option value="1">Maquillaje profesional ($450.00 - 60 min)</option>
                        <option value="2">Manicure básico ($180.00 - 30 min)</option>
                        <option value="3">Corte de cabello ($250.00 - 45 min)</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="empleado" class="block text-sm font-medium text-gray-700 mb-1">Empleado</label>
                    <select id="empleado" name="empleado" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                        <option value="">Seleccione un empleado</option>
                        <option value="1">María González (Estilista)</option>
                        <option value="2">Carlos Martínez (Barbero)</option>
                        <option value="3">Ana López (Manicurista)</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                    </div>
                    
                    <div>
                        <label for="hora" class="block text-sm font-medium text-gray-700 mb-1">Hora</label>
                        <input type="time" id="hora" name="hora" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                    <select id="estado" name="estado" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                        <option value="confirmed">Confirmada</option>
                        <option value="pending">Pendiente</option>
                        <option value="cancelled">Cancelada</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="notas" class="block text-sm font-medium text-gray-700 mb-1">Notas</label>
                    <textarea id="notas" name="notas" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300" placeholder="Notas adicionales..."></textarea>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancelar</button>
                    <button type="submit" class="btn-primary text-white px-4 py-2 rounded-md">Guardar Cita</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS personalizado -->
    <script src="{{ asset('js/CitasAdmin.js') }}" defer></script>
</body>
</html>