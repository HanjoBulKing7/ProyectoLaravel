<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Reservas - Beauty Bonita</title>
        
        <!-- Tailwind y fuentes -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- CSS personalizado -->
        <link rel="stylesheet" href="{{ asset('css/reserva.css') }}">
        <!-- CSS del menú -->
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    </head>
    <body class="bg-[#eee7df]">
      
    <!-- Menú reutilizable -->
    @include('layouts.menu')

    <!-- Reserva Section -->
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-6">
        <h1 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">Reserva tu cita</h1>
        
        <div class="bg-white rounded-xl shadow-lg p-8">
            <form class="space-y-8">

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-gray-700 mb-2">Nombre completo</label>
                <input type="text" id="nombre" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 outline-none">
            </div>

            <!-- Teléfono -->
            <div>
                <label for="telefono" class="block text-gray-700 mb-2">Teléfono</label>
                <input type="tel" id="telefono" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 outline-none">
            </div>

            <!-- Estilistas -->
            <div>
                <label class="block text-gray-700 mb-4 text-lg font-medium">Selecciona tu estilista</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- María -->
                <div class="estilista-card">
                    <div class="image-container">
                    <img src="{{ asset('empleadas/maria.jpg') }}" class="estilista-image">
                    <div class="selected-indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    </div>
                    <div class="estilista-info">
                    <h3 class="estilista-name">María González</h3>
                    <p class="estilista-specialty">Especialista en maquillaje</p>
                    </div>
                    <input type="radio" name="empleada" value="maria" class="hidden">
                </div>

                <!-- Lucía -->
                <div class="estilista-card">
                    <div class="image-container">
                    <img src="{{ asset('empleadas/lucia.jpg') }}" class="estilista-image">
                    <div class="selected-indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    </div>
                    <div class="estilista-info">
                    <h3 class="estilista-name">Lucía Martínez</h3>
                    <p class="estilista-specialty">Experta en uñas</p>
                    </div>
                    <input type="radio" name="empleada" value="lucia" class="hidden">
                </div>

                <!-- Carla -->
                <div class="estilista-card">
                    <div class="image-container">
                    <img src="{{ asset('empleadas/carla.jpg') }}" class="estilista-image">
                    <div class="selected-indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    </div>
                    <div class="estilista-info">
                    <h3 class="estilista-name">Carla Rodríguez</h3>
                    <p class="estilista-specialty">Diseño de cejas</p>
                    </div>
                    <input type="radio" name="empleada" value="carla" class="hidden">
                </div>

                <!-- Sofía -->
                <div class="estilista-card">
                    <div class="image-container">
                    <img src="{{ asset('empleadas/sofia.jpg') }}" class="estilista-image">
                    <div class="selected-indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    </div>
                    <div class="estilista-info">
                    <h3 class="estilista-name">Sofía López</h3>
                    <p class="estilista-specialty">Extensiones de pestañas</p>
                    </div>
                    <input type="radio" name="empleada" value="sofia" class="hidden">
                </div>
                </div>
            </div>

            <!-- Servicios -->
            <div>
                <label class="block text-gray-700 mb-3">Selecciona el servicio</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="card-option">
                    <img src="{{ asset('images/maqullaje.png') }}" class="w-full h-32 object-cover">
                    <div class="p-2 text-center font-medium">Maquillaje Profesional</div>
                    <input type="radio" name="servicio" value="maquillaje" class="hidden">
                </div>
                <div class="card-option">
                    <img src="{{ asset('images/Uñas2.jpg') }}" class="w-full h-32 object-cover">
                    <div class="p-2 text-center font-medium">Manicure y Pedicure</div>
                    <input type="radio" name="servicio" value="unas" class="hidden">
                </div>
                <div class="card-option">
                    <img src="{{ asset('images/cejas.png') }}" class="w-full h-32 object-cover">
                    <div class="p-2 text-center font-medium">Diseño de Cejas</div>
                    <input type="radio" name="servicio" value="cejas" class="hidden">
                </div>
                <div class="card-option">
                    <img src="{{ asset('images/pestañas3.png') }}" class="w-full h-32 object-cover">
                    <div class="p-2 text-center font-medium">Extensiones de Pestañas</div>
                    <input type="radio" name="servicio" value="pestanas" class="hidden">
                </div>
                </div>
            </div>

            <!-- Calendario, Hora y Botón se mantienen igual -->
             <div class="mb-6">
                <label class="block text-gray-700 mb-3 font-medium">Selecciona fecha disponible</label>
                
                <div class="bg-white rounded-lg shadow-md p-4">
                    <!-- Controles del Mes -->
                    <div class="flex justify-between items-center mb-4">
                        <button id="prev-month" class="p-2 rounded-full hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <h3 id="current-month" class="text-lg font-semibold">Junio 2024</h3>
                        <button id="next-month" class="p-2 rounded-full hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Días de la semana -->
                    <div class="grid grid-cols-7 gap-1 mb-2 text-center text-sm text-gray-500">
                        <div>Lun</div><div>Mar</div><div>Mié</div><div>Jue</div><div>Vie</div><div>Sáb</div><div>Dom</div>
                    </div>
                    
                    <!-- Días del mes -->
                    <div id="calendar-days" class="grid grid-cols-7 gap-1"></div>
                </div>
                
                <!-- Input oculto para almacenar la fecha seleccionada -->
                <input type="hidden" id="selected-date" name="fecha">
            </div>

          <!-- Hora -->
          <div>
            <label class="block text-gray-700 mb-2">Selecciona hora</label>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-3">
                <button type="button" class="time-option">9:00 AM</button>
                <button type="button" class="time-option">10:30 AM</button>
                <button type="button" class="time-option">12:00 PM</button>
                <button type="button" class="time-option">2:00 PM</button>
                <button type="button" class="time-option">3:30 PM</button>
                <button type="button" class="time-option">5:00 PM</button>
            </div>
            </div>

          <!-- Botón -->
          <div class="pt-4 bg-beige">
          <button type="button" 
                  id="reservar-btn"
                  class="w-full bg-rose-600 text-white py-4 rounded-xl text-lg font-semibold shadow hover:bg-rose-700 transition">
              Reservar y pagar anticipo
          </button>
          </div>
        </form>
      </div>
    </div>

            </form>
        </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#c8c2bc] text-white py-8">
        <div class="max-w-6xl mx-auto px-6 text-center">
        <p>© 2025 Beauty Bonita - Todos los derechos reservados</p>
        </div>
    </footer>

    <!-- JS personalizado -->
    <script src="{{ asset('js/reserva.js') }}" defer></script>
    <script src="{{ asset('js/menu.js') }}"></script>

    </body>
</html>
