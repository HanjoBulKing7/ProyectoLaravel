<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beauty - Estética Profesional</title>

  {{-- Tailwind CSS CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>

  {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />

  {{-- Tu hoja de estilos personalizada --}}
    <link rel="stylesheet" href="{{ asset('css/servicio.css') }}">
</head>
<body class="font-sans bg-beige">
  <!-- Header -->
  <header class="header">
    <nav class="nav">
      <!-- Logo -->
      <div class="logo">
        <a href="{{ url('/home') }}">
          <img src="{{ asset('iconos/logo blanco.png') }}" alt="Beauty Logo" class="logo-img">
        </a>
      </div>

      <!-- Botón Móvil -->
      <button id="menu-btn" class="rounded-full p-2" style="background-color: #f9f4ef52;">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
          <ellipse cx="12" cy="20" rx="5" ry="1.2" fill="rgba(0,0,0,0.08)" />
          <rect x="10.5" y="3" width="3" height="6" rx="0.8" fill="#C17B7B" stroke="#5A3E36" stroke-width="0.8" />
          <rect x="10.5" y="9" width="3" height="5" fill="#EED1CC" stroke="#5A3E36" stroke-width="0.8" />
          <rect x="9.8" y="14" width="4.4" height="4" rx="0.8" fill="#9C7C6D" stroke="#5A3E36" stroke-width="0.8" />
        </svg>
      </button>

      <!-- Menú Escritorio -->
      <div class="desktop-menu">
        <a href="{{ url('/home') }}">Inicio</a>
        <a href="#servicios">Servicios</a>
        <a href="{{ url('sucursal') }}">Sucursal</a>
        <a href="{{ url('reserva') }}">Reserva</a>
        
        @auth
          <!-- Si el usuario está autenticado -->
          <div class="relative user-menu-container">
            <button id="user-menu-button" class="flex items-center focus:outline-none">
              <span class="mr-1">{{ Auth::user()->name }}</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <div id="user-menu" class="absolute hidden right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
              <a href="{{ url('perfil') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ver perfil</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar sesión</button>
              </form>
            </div>
          </div>
        @else
          <!-- Si el usuario no está autenticado -->
          <a href="{{ route('login') }}">Iniciar sesión</a>
        @endauth
      </div>
    </nav>

    <!-- Menú Móvil -->
    <div id="mobile-menu" class="mobile-menu">
      <div class="mobile-menu-content">
        <a href="{{ url('/home') }}">Inicio</a>
        <a href="#servicios">Servicios</a>
        <a href="{{ url('sucursal') }}">Sucursal</a>
        
        @auth
          <!-- Si el usuario está autenticado (versión móvil) -->
          <a href="{{ url('perfil') }}">Mi perfil</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left py-2 text-gray-700 border-b border-gray-200">Cerrar sesión</button>
          </form>
        @else
          <!-- Si el usuario no está autenticado (versión móvil) -->
          <a href="{{ route('login') }}">Iniciar sesión</a>
        @endauth

        <div class="highlight-section">
          <p class="highlight-text">Resalta tu belleza</p>
          <a href="{{ url('reserva') }}" class="cta-button">Agenda tu cita</a>
          <p class="natural-text">Natural</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Hero Section del servicio -->
  <section class="relative py-20 bg-gradient-to-r from-amber-800 to-amber-600">
    <div class="max-w-6xl mx-auto px-6 lg:px-12 text-center text-white">
      <h1 class="text-4xl md:text-6xl font-montas mb-6">Maquillaje Profesional</h1>
      <p class="text-xl md:text-2xl max-w-3xl mx-auto">
        Realza tu belleza natural con nuestras técnicas expertas adaptadas a cada ocasión
      </p>
    </div>
  </section>

  <!-- Tipos de Maquillaje -->
  <section class="py-20 bg-beige" id="servicios">
    <div class="max-w-6xl mx-auto px-6 lg:px-12">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Maquillaje Natural -->
        <div class="service-card bg-white rounded-xl overflow-hidden">
          <img src="{{ asset('images/maqullaje.png') }}" alt="Maquillaje Natural" class="w-full h-64 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-montas text-gray-800 mb-3">Estilo Natural</h3>
            <p class="text-gray-600 mb-4">
              Perfecto para el día a día. Resalta tus rasgos con un look fresco y luminoso que parece tu piel pero mejorada.
            </p>
            <ul class="space-y-2 text-gray-700 mb-6">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Duración: 45 min - 1 hora
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Productos ligeros y transpirables
              </li>
            </ul>
            <a id="BtnReservas" href="{{ url('reservas') }}" class="inline-block bg-gray-300 text-white px-6 py-2 rounded-full hover:bg-gray-400 transition-colors">
              Reservar
            </a>
          </div>
        </div>

        <!-- Maquillaje de Noche -->
        <div class="service-card bg-white rounded-xl overflow-hidden">
          <img src="{{ asset('images/Uñas2.jpg') }}" alt="Maquillaje de Noche" class="w-full h-64 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-montas text-gray-800 mb-3">Estilo Elegante</h3>
            <p class="text-gray-600 mb-4">
              Ideal para eventos nocturnos. Contornos definidos, ojos ahumados y labios intensos para una mirada dramática.
            </p>
            <ul class="space-y-2 text-gray-700 mb-6">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Duración: 1 - 1.5 horas
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Productos de larga duración
              </li>
            </ul>
            <a id="BtnReservas" href="{{ url('reservas') }}" class="inline-block bg-gray-300 text-white px-6 py-2 rounded-full hover:bg-gray-400 transition-colors">
              Reservar
            </a>
          </div>
        </div>

        <!-- Maquillaje Artístico -->
        <div class="service-card bg-white rounded-xl overflow-hidden">
          <img src="{{ asset('images/maqullaje2.png') }}" alt="Maquillaje Artístico" class="w-full h-64 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-montas text-gray-800 mb-3">Estilo Creativo</h3>
            <p class="text-gray-600 mb-4">
              Para los looks más atrevidos. Desde fantasía hasta efectos especiales, creamos arte en tu rostro.
            </p>
            <ul class="space-y-2 text-gray-700 mb-6">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Duración: 1.5 - 2.5 horas
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Materiales especializados
              </li>
            </ul>
            <a id="BtnReservas" href="{{ url('reservas') }}" class="inline-block bg-gray-300 text-white px-6 py-2 rounded-full hover:bg-gray-400 transition-colors">
              Reservar
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Galería de trabajos -->
  <section class="py-20 bg-white" id="galeria">
    <div class="max-w-6xl mx-auto px-6 lg:px-12">
      <h2 class="text-3xl text-center font-montas mb-12 text-gray-800">Nuestros Trabajos</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="overflow-hidden rounded-lg">
          <img src="{{ asset('images/53b8d035-6ec7-45c2-a839-bcd153cb7f18.png') }}" alt="Trabajo de maquillaje 1" class="w-full h-64 object-cover hover:scale-105 transition-transform">
        </div>
        <div class="overflow-hidden rounded-lg">
          <img src="{{ asset('images/909d855e-7946-4ce7-b652-c89cb22d011f.png') }}" alt="Trabajo de maquillaje 2" class="w-full h-64 object-cover hover:scale-105 transition-transform">
        </div>
        <div class="overflow-hidden rounded-lg">
          <img src="{{ asset('images/ad7e9883-c371-4a40-ad0c-09349ac70159.png') }}" alt="Trabajo de maquillaje 3" class="w-full h-64 object-cover hover:scale-105 transition-transform">
        </div>
        <div class="overflow-hidden rounded-lg">
          <img src="{{ asset('images/maqullaje2.png') }}" alt="Trabajo de maquillaje 4" class="w-full h-64 object-cover hover:scale-105 transition-transform">
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-16 bg-beige text-white">
    <div class="max-w-4xl mx-auto px-6 lg:px-12 text-center">
      <h2 class="text-3xl md:text-4xl font-montas mb-6">¿Lista para realzar tu belleza?</h2>
      <p class="text-xl mb-8 max-w-2xl mx-auto">
        Agenda una consulta gratuita para discutir el look perfecto para tu ocasión especial
      </p>
      <a id="CTAA" href="{{ url('reservas') }}" class="inline-block bg-white  px-8 py-3 rounded-full font-montas hover:bg-gray-100 transition-colors">
        Agendar Consulta
      </a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-[#eee7df] text-white py-10">
    <div class="text-center font-montas text-white">
      <p>© 2025 Beauty Bonita - Todos los derechos reservados</p>
    </div>
  </footer>

  {{-- JS usando asset() --}}
    <script src="{{ asset('js/servicio.js') }}"></script>
</body>
</html>
