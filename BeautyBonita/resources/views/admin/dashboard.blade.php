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
    <link rel="stylesheet" href="{{ asset('css/AdminDashboard.css') }}">
    
    <!-- Chart.js para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <span class="text-lg font-medium"> Beauty Bonita Dashboard</span>
                </div>
                
                
                <!-- Menú principal -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ url('/admin/home') }}" class="nav-item active px-4 py-2 flex items-center">
                        <i data-feather="home" class="mr-2 w-5 h-5"></i>
                        Dashboard
                    </a>
                    <a href="{{ url('/admin/servicios') }}" class="nav-item px-4 py-2 flex items-center">
                        <i data-feather="scissors" class="mr-2 w-5 h-5"></i>
                        Servicios
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
            <a href="{{ url('/admin/home') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-gray-100 text-gray-900">
                <i data-feather="home" class="inline mr-2 w-4 h-4"></i>
                Dashboard
            </a>
            <a href="{{ url('/admin/servicios') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">
                <i data-feather="scissors" class="inline mr-2 w-4 h-4"></i>
                Servicios
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
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-light text-gray-800">Panel de Administración</h1>
            <p class="text-gray-500 mt-1">Resumen general de tu salón de belleza</p>
        </div>

        <!-- Métricas principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Tarjeta Citas Hoy -->
            <div class="card p-5">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-50 text-blue-600">
                        <i data-feather="calendar" class="w-6 h-6"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Citas hoy</p>
                        <p class="text-2xl font-semibold text-gray-800">8</p>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-sm text-green-600 font-medium">+2 desde ayer</span>
                </div>
            </div>
            
            <!-- Tarjeta Ingresos Mensuales -->
            <div class="card p-5">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-50 text-green-600">
                        <i data-feather="dollar-sign" class="w-6 h-6"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Ingresos este mes</p>
                        <p class="text-2xl font-semibold text-gray-800">$12,450.00</p>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-sm text-green-600 font-medium">+15% mes anterior</span>
                </div>
            </div>
            
            <!-- Tarjeta Clientes Nuevos -->
            <div class="card p-5">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-50 text-purple-600">
                        <i data-feather="users" class="w-6 h-6"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Clientes nuevos</p>
                        <p class="text-2xl font-semibold text-gray-800">14</p>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-sm text-green-600 font-medium">+3 semana pasada</span>
                </div>
            </div>
            
            <!-- Tarjeta Servicios Populares -->
            <div class="card p-5">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-50 text-yellow-600">
                        <i data-feather="scissors" class="w-6 h-6"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Servicio popular</p>
                        <p class="text-xl font-semibold text-gray-800 truncate">Maquillaje profesional</p>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-sm text-gray-500">32 reservas este mes</span>
                </div>
            </div>
        </div>

        <!-- Gráficos y contenido principal -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Gráfico de ingresos -->
            <div class="card p-5 lg:col-span-2">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-medium text-gray-800">Ingresos últimos 30 días</h2>
                    <select class="px-3 py-1 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300 text-sm">
                        <option>Últimos 30 días</option>
                        <option>Este mes</option>
                        <option>Mes pasado</option>
                    </select>
                </div>
                <div class="h-64">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
            
            <!-- Resumen de citas -->
            <div class="card p-5">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-medium text-gray-800">Citas recientes</h2>
                    <a href="{{ url('/citasadmin') }}" class="text-sm text-gray-500 hover:text-gray-700">Ver todas</a>
                </div>
                <div class="space-y-4">
                    <!-- Cita 1 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                            <i data-feather="calendar" class="w-5 h-5"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Laura Sánchez</p>
                            <p class="text-xs text-gray-500">Maquillaje profesional - 10:00 AM</p>
                        </div>
                        <span class="ml-auto badge-confirmed px-2 py-1 text-xs rounded-full">Confirmada</span>
                    </div>
                    
                    <!-- Cita 2 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                            <i data-feather="calendar" class="w-5 h-5"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Ana Rodríguez</p>
                            <p class="text-xs text-gray-500">Manicure básico - 11:30 AM</p>
                        </div>
                        <span class="ml-auto badge-pending px-2 py-1 text-xs rounded-full">Pendiente</span>
                    </div>
                    
                    <!-- Cita 3 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                            <i data-feather="calendar" class="w-5 h-5"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Carla Méndez</p>
                            <p class="text-xs text-gray-500">Corte de cabello - 03:00 PM</p>
                        </div>
                        <span class="ml-auto badge-confirmed px-2 py-1 text-xs rounded-full">Confirmada</span>
                    </div>
                    
                    <!-- Cita 4 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                            <i data-feather="calendar" class="w-5 h-5"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">María González</p>
                            <p class="text-xs text-gray-500">Extensiones de pestañas - 04:30 PM</p>
                        </div>
                        <span class="ml-auto badge-confirmed px-2 py-1 text-xs rounded-full">Confirmada</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección inferior -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Clientes recientes -->
            <div class="card p-5">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-medium text-gray-800">Clientes recientes</h2>
                    <a href="{{ url('/clientesadmin') }}" class="text-sm text-gray-500 hover:text-gray-700">Ver todos</a>
                </div>
                <div class="space-y-4">
                    <!-- Cliente 1 -->
                    <div class="flex items-center">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('images/cejas.png') }}" alt="">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Sofía Ramírez</p>
                            <p class="text-xs text-gray-500">Registrado hoy</p>
                        </div>
                        <div class="ml-auto text-sm text-gray-500">2 citas</div>
                    </div>
                    
                    <!-- Cliente 2 -->
                    <div class="flex items-center">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('images/pestañas3.png') }}" alt="">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Daniel Torres</p>
                            <p class="text-xs text-gray-500">Registrado ayer</p>
                        </div>
                        <div class="ml-auto text-sm text-gray-500">1 cita</div>
                    </div>
                    
                    <!-- Cliente 3 -->
                    <div class="flex items-center">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('images/pestañas.png') }}" alt="">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Patricia López</p>
                            <p class="text-xs text-gray-500">Registrado hace 2 días</p>
                        </div>
                        <div class="ml-auto text-sm text-gray-500">3 citas</div>
                    </div>
                </div>
            </div>
            
            <!-- Servicios populares -->
            <div class="card p-5">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-medium text-gray-800">Servicios populares</h2>
                    <a href="{{ url('/serviciosadmin') }}" class="text-sm text-gray-500 hover:text-gray-700">Ver todos</a>
                </div>
                <div class="space-y-3">
                    <!-- Servicio 1 -->
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Maquillaje profesional</span>
                            <span class="font-medium">32 reservas</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                    
                    <!-- Servicio 2 -->
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Manicure básico</span>
                            <span class="font-medium">28 reservas</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-600 h-2 rounded-full" style="width: 40%"></div>
                        </div>
                    </div>
                    
                    <!-- Servicio 3 -->
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Corte de cabello</span>
                            <span class="font-medium">24 reservas</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 35%"></div>
                        </div>
                    </div>
                    
                    <!-- Servicio 4 -->
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Extensiones de pestañas</span>
                            <span class="font-medium">18 reservas</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS personalizado -->
    <script src="{{ asset('js/AdminDashboard.js') }}" defer></script>
</body>
</html>