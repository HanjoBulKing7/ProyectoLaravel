<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Tailwind -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  
  <!-- Fuentes -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS personalizado -->
  <link rel="stylesheet" href="{{ asset('css/sucursal.css') }}">

  <title>Sucursal | Galería</title>
</head>
<body>

  <!-- Header -->
  <header class="relative z-50 bg-beige-900/70 backdrop-blur-md">
    <nav class="flex items-center justify-between px-6 py-4 lg:px-12">
      <!-- Logo -->
      <div class="text-2xl font-bold tracking-wider">
        <a href="{{ url('/') }}">
          <img src="{{ asset('iconos/logo.png') }}" alt="Beauty Bonita Logo" class="h-10 md:h-16">
        </a>
      </div>

      <!-- Desktop Navigation -->
      <div class="hidden md:flex items-center space-x-6 text-black text-lg">
        <a href="{{ url('/') }}" class="hover:text-black/80">Inicio</a>
        <a href="#galeria" class="hover:text-black/80">Galería</a>
        <a href="#ubicacion" class="hover:text-black/80">Dónde estamos</a>
        <a href="#ofrecemos" class="hover:text-black/80">Qué ofrecemos</a>
      </div>
    </nav>
  </header>

  <!-- Galería -->
  <section id="galeria" class="mt-8 text-center">
    <header>
      <h1>Bienvenida a nuestra sucursal</h1>
      <p>Explora cada rincón a través de nuestra galería visual</p>
    </header>

    <div class="carousel-wrapper mx-auto mt-6" id="carouselWrapper">
      <img id="carouselImage" src="" alt="Sucursal" onclick="abrirFullscreen(this.src)" />
    </div>
  </section>

  <!-- Sección Ubicación -->
  <section id="ubicacion" class="section mt-12">
    <div class="section mx-auto p-6 bg-white rounded-xl shadow-md max-w-3xl">
      <h2>¿Dónde estamos?</h2>
      <p>Nos encontramos en una ubicación privilegiada, con fácil acceso y estacionamiento. Nuestro equipo te espera con una sonrisa y la mejor atención.</p>
      <p>Dirección: Av. Ejemplo #123, Ciudad, Estado, CP 00000</p>
    </div>
  </section>

  <!-- Sección Qué ofrecemos -->
  <section id="ofrecemos" class="section mt-12">
    <div class="section mx-auto p-6 bg-white rounded-xl shadow-md max-w-3xl">
      <h2>¿Qué ofrecemos?</h2>
      <ul class="list-disc list-inside">
        <li>Atención personalizada</li>
        <li>Ambientes limpios y modernos</li>
        <li>Zona de espera cómoda</li>
        <li>Experiencia profesional en cada servicio</li>
      </ul>
    </div>
  </section>

  <!-- Pantalla completa -->
  <div id="fullscreen-overlay">
    <span class="close-btn">&times;</span>
    <img id="fullscreen-img" src="" alt="Foto en grande" />
  </div>

  <!-- JS personalizado -->
  <script src="{{ asset('js/sucursal.js') }}" defer></script>
</body>
</html>
