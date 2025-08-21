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
    <link rel="stylesheet" href="{{ asset('css/EmpleadosAdmin.css') }}">
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="top-nav text-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo y nombre -->
                <div class="flex items-center">
                    <img src="{{ asset('iconos/logo blanco.png') }}" alt="Logo" class="h-8 mr-3">
                    <span class="text-lg font-medium"> Admin Empleados </span>
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
                    <a href="{{ url('/citasadmin') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="calendar" class="mr-2 w-5 h-5"></i>
                        Citas
                    </a>
                    <a href="{{ url('/clientesadmin') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="users" class="mr-2 w-5 h-5"></i>
                        Clientes
                    </a>
                    <a href="{{ url('/empleadosadmin') }}" class="nav-item active px-4 py-2 flex items-center">
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
            <a href="{{ url('/citasadmin') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="calendar" class="inline mr-2 w-4 h-4"></i>
                Citas
            </a>
            <a href="{{ url('/clientesadmin') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="users" class="inline mr-2 w-4 h-4"></i>
                Clientes
            </a>
            <a href="{{ url('/empleadosadmin') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-gray-100 text-gray-900">
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
                <h1 class="text-2xl font-light text-gray-800">Gestión de Empleados</h1>
                <p class="text-gray-500 mt-1">Administra el personal de tu salón</p>
            </div>
            <button onclick="openModal()" class="btn-primary text-white px-4 py-2 rounded-md flex items-center mt-4 md:mt-0">
                <i data-feather="plus" class="mr-2 w-4 h-4"></i>
                Nuevo Empleado
            </button>
        </div>

        <!-- Tarjeta de contenido -->
        <div class="card overflow-hidden">
            <!-- Barra de búsqueda y filtros -->
            <div class="p-4 border-b flex flex-col md:flex-row md:items-center justify-between">
                <div class="relative mb-4 md:mb-0">
                    <i data-feather="search" class="absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" placeholder="Buscar empleados..." class="pl-10 pr-4 py-2 w-full md:w-64 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300">
                </div>
                <div class="flex space-x-2">
                    <select class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300 text-sm">
                        <option>Todos los estados</option>
                        <option>Activos</option>
                        <option>Inactivos</option>
                    </select>
                    <select class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300 text-sm">
                        <option>Ordenar por</option>
                        <option>Nombre A-Z</option>
                        <option>Nombre Z-A</option>
                        <option>Fecha de ingreso ↑</option>
                        <option>Fecha de ingreso ↓</option>
                    </select>
                </div>
            </div>

            <!-- Tabla de empleados -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Puesto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Empleado 1 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ asset('empleadas/maria.jpg') }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">María</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Estilista</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">55 1234 5678</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">maria@beautybonita.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="badge-active px-2 py-1 text-xs rounded-full">Activo</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-gray-500 hover:text-gray-700 mr-3">
                                    <i data-feather="edit" class="w-4 h-4"></i>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Empleado 2 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ asset('empleadas/lucia.jpg') }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">Lucia</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Maquillista</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">55 8765 4321</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">lucia@beautybonita.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="badge-active px-2 py-1 text-xs rounded-full">Activo</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-gray-500 hover:text-gray-700 mr-3">
                                    <i data-feather="edit" class="w-4 h-4"></i>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Empleado 3 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ asset('empleadas/Carla.jpg') }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">Carla</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Manicurista</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">55 9876 5432</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">carla@beautybonita.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="badge-inactive px-2 py-1 text-xs rounded-full">Inactivo</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-gray-500 hover:text-gray-700 mr-3">
                                    <i data-feather="edit" class="w-4 h-4"></i>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="bg-gray-50 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">3</span> de <span class="font-medium">3</span> resultados
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

    <!-- Modal para agregar/editar empleado -->
    <div id="employeeModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-medium text-gray-800">Agregar Nuevo Empleado</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <i data-feather="x" class="w-5 h-5"></i>
                </button>
            </div>
            
            <form class="p-4">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
                    <div class="mt-1 flex items-center">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cambiar
                        </button>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                    </div>
                    
                    <div>
                        <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-1">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="puesto" class="block text-sm font-medium text-gray-700 mb-1">Puesto</label>
                    <select id="puesto" name="puesto" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                        <option value="">Seleccione un puesto</option>
                        <option value="estilista">Estilista</option>
                        <option value="barbero">Barbero</option>
                        <option value="manicurista">Manicurista</option>
                        <option value="maquillista">Maquillista</option>
                        <option value="recepcionista">Recepcionista</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                    </div>
                    
                    <div>
                        <label for="correo" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                        <input type="email" id="correo" name="correo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                    <textarea id="direccion" name="direccion" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300"></textarea>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="fecha_ingreso" class="block text-sm font-medium text-gray-700 mb-1">Fecha de ingreso</label>
                        <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                    </div>
                    
                    <div>
                        <label for="salario" class="block text-sm font-medium text-gray-700 mb-1">Salario (MXN)</label>
                        <input type="number" id="salario" name="salario" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                    <select id="estado" name="estado" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-300">
                        <option value="active">Activo</option>
                        <option value="inactive">Inactivo</option>
                    </select>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancelar</button>
                    <button type="submit" class="btn-primary text-white px-4 py-2 rounded-md">Guardar Empleado</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS personalizado -->
    <script src="{{ asset('js/EmpleadosAdmin.js') }}" defer></script>
</body>
</html>