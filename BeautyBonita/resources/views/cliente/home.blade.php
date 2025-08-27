<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beauty - Estética Profesional</title>

    {{-- TailwindCSS desde CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>

    {{-- Fuente Montserrat --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet"/>

    {{-- Tu hoja de estilos personalizada --}}
    <link rel="stylesheet" href="{{ asset('css/interfaz.css') }}">
  </head>
  <body class="font-sans bg-[#eee7df]">
    {{-- resources/views/interfaz.blade.php --}}
    <!-- Hero Section -->
    <section class="relative min-h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/Beige Blogger Moderna Personal Sitio web.png') }}"
                alt="Modelo profesional con maquillaje elegante"
                class="w-full h-full object-cover"
            />
            <!-- Overlay café -->
            <div class="absolute inset-0 bg-amber-900/20"></div>
            <!-- Capa para contraste del texto -->
            <div class="absolute inset-0 bg-black/30"></div>
        </div>

        <!-- Header -->
        <header class="header">
            <nav class="nav">
                <!-- Logo -->
                <a href="{{ url('/interfaz') }}">
                    <div class="logo">
                        <img src="{{ asset('iconos/logo blanco.png') }}" alt="Beauty Logo" class="logo-img">
                    </div>
                </a>

                <!-- Botón Móvil -->
                <button id="menu-btn" class="rounded-full p-2" style="background-color: #f9f4ef52;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                        <!-- Sombra suave -->
                        <ellipse cx="12" cy="20" rx="5" ry="1.2" fill="rgba(0,0,0,0.08)" />

                        <!-- Labial -->
                        <!-- Tapa -->
                        <rect x="10.5" y="3" width="3" height="6" rx="0.8" fill="#C17B7B" stroke="#5A3E36" stroke-width="0.8" />
                        
                        <!-- Barra del labial -->
                        <rect x="10.5" y="9" width="3" height="5" fill="#EED1CC" stroke="#5A3E36" stroke-width="0.8" />
                        
                        <!-- Base -->
                        <rect x="9.8" y="14" width="4.4" height="4" rx="0.8" fill="#9C7C6D" stroke="#5A3E36" stroke-width="0.8" />
                    </svg>
                </button>

                <!-- Menú Escritorio -->
                <div class="desktop-menu">
                    <a href="{{ url('/interfaz') }}">Inicio</a>
                    <a href="{{ url('/servicio') }}">Servicios</a>
                    <a href="#galeria">Portafolio</a>
                    <a href="#testimonios">Testimonios</a>
                    <a href="#ubicacion">Sucursal</a>

                    <!-- Logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-red-500 hover:text-red-700">
                    Cerrar sesión
                    </a>
                </div>
            </nav>

            <!-- Menú Móvil -->
            <div id="mobile-menu" class="mobile-menu">
                <div class="mobile-menu-content">
                    <a href="{{ url('/') }}">Inicio</a>
                    <a href="{{ url('/servicio') }}">Servicios</a>
                    <a href="#galeria">Portafolio</a>
                    <a href="{{ url('sucursal') }}">Sucursal</a>
                    <a href="#contacto">Testimonios</a>
                    <a href="#contacto">Contacto</a>
                    
                    <div class="highlight-section">
                        <p class="highlight-text">Resalta tu belleza</p>
                        <a href="#contacto" class="cta-button">Agenda tu cita</a>
                        <p class="natural-text">Natural</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero Content CENTRADO -->
        <div class="relative z-10 flex items-center justify-start min-h-screen pl-6 md:pl-12 lg:pl-24">
            <div class="space-y-6 max-w-xl">
                <h1 class="text-4xl md:text-6xl lg:text-7xl leading-tight text-white font-montas">
                Resalta tu <br> belleza Natural
                </h1>

                <h2 class="text-xl md:text-2xl lg:text-3xl leading-relaxed text-white font-montas">
                Agenda tu cita hoy <br> mismo con las <br>
                mejores profesionales
                </h2>

                <a href="{{ url('reservas') }}"
                class="inline-block bg-white text-gray-800 px-8 py-4 mt-6 hover:bg-gray-100 transition-colors duration-200 font-medium font-montas rounded-md shadow-md"
                >
                Agenda tu Cita
                </a>
            </div>
        </div>

    </section>



    <!-- Services Section -->
    <section id="servicios" class="py-20 bg-[#F5EBDD]">
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <h2 class="text-3xl md:text-4xl text-center mb-12 text-gray-800 font-montas">Nuestros Servicios</h2>

            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-items-center">

                <!-- Carta 1 -->
                <div class="w-full max-w-xs rounded-2xl shadow-2xl overflow-hidden hover:shadow-3xl transition-shadow duration-300 bg-white">
                    <img src="{{ asset('images/maqullaje.png') }}" alt="Maquillaje" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-montas text-black mb-3">Maquillaje y Pestañas</h3>
                        <a href="{{ url('servicio') }}" class="inline-block mt-2 bg-beige text-black px-5 py-2 rounded-full hover:bg-beige-800 transition-colors duration-200">Ver más</a>
                    </div>
                </div>

                <!-- Carta 2 -->
                <div class="w-full max-w-xs rounded-2xl shadow-2xl overflow-hidden hover:shadow-3xl transition-shadow duration-300 bg-white">
                    <img src="{{ asset('images/Peinado2.png') }}" alt="Peinado" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-montas text-black mb-3">Cabello</h3>
                        <a href="{{ url('servicio') }}" class="inline-block mt-2 bg-beige text-black px-5 py-2 rounded-full hover:bg-beige-800 transition-colors duration-200">Ver más</a>
                    </div>
                </div>

                <!-- Carta 3 -->
                <div class="w-full max-w-xs rounded-2xl shadow-2xl overflow-hidden hover:shadow-3xl transition-shadow duration-300 bg-white">
                    <img src="{{ asset('images/Peinado.png') }}" alt="Color" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-montas text-black mb-3">Manicure y Pedicure</h3>
                        <a href="{{ url('servicio') }}" class="inline-block mt-2 bg-beige text-black px-5 py-2 rounded-full hover:bg-beige-800 transition-colors duration-200">Ver más</a>
                    </div>
                </div>

                <!-- Carta 4 -->
                <div class="w-full max-w-xs rounded-2xl shadow-2xl overflow-hidden hover:shadow-3xl transition-shadow duration-300 bg-white">
                    <img src="{{ asset('images/maqullaje.png') }}" alt="Corte" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-montas text-black mb-3">Faciales y Tratamientos</h3>
                        <a href="{{ url('servicio') }}" class="inline-block mt-2 bg-beige text-black px-5 py-2 rounded-full hover:bg-beige-800 transition-colors duration-200">Ver más</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="bg-[#F5EBDD] py-20 px-6" id="sucursal-section">
    <div class="max-w-6xl mx-auto text-center space-y-8">
        <a href="{{ url('sucursal') }}" class="cursor-pointer">
            <h2 class="text-3xl md:text-4xl font-montas text-gray-800">
                Conoce nuestra sucursal
            </h2>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Descubre las instalaciones y el ambiente que ofrecemos en nuestra sucursal para brindarte la mejor experiencia.
            </p>
        </a>

        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Video con efecto de scroll -->
            <div class="w-full lg:w-1/2 transition-all duration-500 transform hover:scale-105">
                <div class="rounded-xl overflow-hidden shadow-lg video-container">
                    <video class="w-full h-auto max-h-[70vh] object-cover cursor-pointer"
                        autoplay muted loop playsinline
                        onclick="toggleFullscreen(this)">
                        <source src="{{ asset('videos/copy_2C830AC7-5410-4619-A784-F171A6F040E2.MOV') }}" type="video/mp4" />
                        Tu navegador no soporta videos en HTML5.
                    </video>
                </div>
            </div>

            <!-- Información de la sucursal (aparece al hacer scroll) -->
            <div class="w-full lg:w-1/2 space-y-6 info-container opacity-0 translate-y-10 transition-all duration-700">
                <div class="text-left space-y-4">
                    <h3 class="text-2xl font-semibold text-gray-800">Nuestra ubicación</h3>
                    <p class="text-gray-600">
                        <i class="fas fa-map-marker-alt mr-2 text-[#a18a7c]"></i>
                        Av. Principal #123, Colonia Centro, Ciudad de México
                    </p>
                    <p class="text-gray-600">
                        <i class="fas fa-clock mr-2 text-[#a18a7c]"></i>
                        Horario: Lunes a Sábado de 9:00 AM a 8:00 PM
                    </p>
                    <p class="text-gray-600">
                        <i class="fas fa-phone mr-2 text-[#a18a7c]"></i>
                        Teléfono: 55 1234 5678
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-start">
                    <a href="tel:5512345678" class="bg-[#a18a7c] text-white px-6 py-3 rounded-lg hover:bg-[#8a7568] transition-colors duration-300 flex items-center justify-center">
                        <i class="fas fa-phone mr-2"></i> Llamar ahora
                    </a>
                    <a href="{{ url('reservas') }}" class="bg-white text-[#a18a7c] border border-[#a18a7c] px-6 py-3 rounded-lg hover:bg-[#f5f0eb] transition-colors duration-300 flex items-center justify-center">
                        <i class="fas fa-calendar-check mr-2"></i> Reservar cita
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Efectos para el video al hacer scroll */
    .video-container {
        transition: transform 0.5s ease;
    }

    /* Clase que se agregará con JavaScript al hacer scroll */
    .scale-video {
        transform: scale(0.7);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Mostrar información con efecto fade-in */
    .show-info {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
</style>

<script>
    // Función para pantalla completa
    function toggleFullscreen(video) {
        if (video.requestFullscreen) {
            video.requestFullscreen();
        } else if (video.webkitRequestFullscreen) {
            video.webkitRequestFullscreen();
        } else if (video.msRequestFullscreen) {
            video.msRequestFullscreen();
        }
    }

    // Efecto de scroll con Intersection Observer
    document.addEventListener('DOMContentLoaded', function() {
        const section = document.getElementById('sucursal-section');
        const videoContainer = document.querySelector('.video-container');
        const infoContainer = document.querySelector('.info-container');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Aplicar efecto al video
                    videoContainer.classList.add('scale-video');
                    
                    // Mostrar información con retraso
                    setTimeout(() => {
                        infoContainer.classList.add('show-info');
                    }, 300);
                    
                    // Opcional: dejar de observar después de activarse
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 }); // Se activa cuando el 30% de la sección es visible

        observer.observe(section);

        // Asegurarse de que Font Awesome esté cargado
        if (!document.querySelector('link[href*="font-awesome"]')) {
            const faLink = document.createElement('link');
            faLink.rel = 'stylesheet';
            faLink.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css';
            document.head.appendChild(faLink);
        }
    });
</script>


    <!-- Gallery Section -->
    <section id="galeria" class="py-20 bg-[#F5EBDD]">
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <h2 class="text-3xl text-center mb-12 text-gray-800">Galería</h2>

            <div class="flex flex-col lg:flex-row gap-4 items-stretch">
            <!-- Imagen lateral izquierda (alta) -->
            <div class="lg:w-1/5 overflow-hidden rounded-lg hover:scale-[1.02] transition-transform duration-300 cursor-pointer">
                <img
                src="{{ asset('images/maqullaje2.png') }}"
                alt="Trabajo de belleza izquierda"
                class="w-full h-full object-cover"
                style="min-height: 600px;"
                >
            </div>

            <!-- Galería central 2 filas × 3 columnas -->
            <div class="lg:w-3/5 grid grid-cols-3 grid-rows-2 gap-3 h-[600px]">
                <div class="overflow-hidden rounded-lg hover:scale-[1.05] transition-transform duration-300 cursor-pointer">
                <img src="{{ asset('images/53b8d035-6ec7-45c2-a839-bcd153cb7f18.png') }}" alt="Trabajo 1" class="w-full h-full object-cover">
                </div>
                <div class="overflow-hidden rounded-lg hover:scale-[1.05] transition-transform duration-300 cursor-pointer">
                <img src="{{ asset('images/909d855e-7946-4ce7-b652-c89cb22d011f.png') }}" alt="Trabajo 2" class="w-full h-full object-cover">
                </div>
                <div class="overflow-hidden rounded-lg hover:scale-[1.05] transition-transform duration-300 cursor-pointer">
                <img src="{{ asset('images/ad7e9883-c371-4a40-ad0c-09349ac70159.png') }}" alt="Trabajo 3" class="w-full h-full object-cover">
                </div>
                <div class="overflow-hidden rounded-lg hover:scale-[1.05] transition-transform duration-300 cursor-pointer">
                <img src="{{ asset('images/maqullaje.png') }}" alt="Trabajo 4" class="w-full h-full object-cover">
                </div>
                <div class="overflow-hidden rounded-lg hover:scale-[1.05] transition-transform duration-300 cursor-pointer">
                <img src="{{ asset('images/maqullaje2.png') }}" alt="Trabajo 5" class="w-full h-full object-cover">
                </div>
                <div class="overflow-hidden rounded-lg hover:scale-[1.05] transition-transform duration-300 cursor-pointer">
                <img src="{{ asset('images/pestañas.png') }}" alt="Trabajo 6" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Imagen lateral derecha (alta) -->
            <div class="lg:w-1/5 overflow-hidden rounded-lg hover:scale-[1.02] transition-transform duration-300 cursor-pointer">
                <img
                src="{{ asset('images/ad7e9883-c371-4a40-ad0c-09349ac70159.png') }}"
                alt="Trabajo de belleza derecha"
                class="w-full h-full object-cover"
                style="min-height: 600px;"
                >
            </div>
            </div>
        </div>
    </section>


    <!-- Testimonials Section -->
    <section id="testimonios" class="py-20 bg-[#F5EBDD]">
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <h2 class="text-3xl text-center mb-12 text-gray-800">Testimonios</h2>

            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
            <!-- Testimonio 1 -->
            <div class="text-center">
                <div class="mb-6">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="mx-auto"
                >
                    <path
                    d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
                    ></path>
                </svg>
                </div>

                <blockquote
                class="text-lg text-gray-700 mb-4 italic leading-relaxed"
                >
                "Quedé encantada con mi maquillaje, superó todas mis expectativas"
                </blockquote>

                <cite class="text-gray-600"> — Brenda Cervantes </cite>
            </div>

            <!-- Testimonio 2 -->
            <div class="text-center">
                <div class="mb-6">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="mx-auto"
                >
                    <path
                    d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
                    ></path>
                </svg>
                </div>

                <blockquote
                class="text-lg text-gray-700 mb-4 italic leading-relaxed"
                >
                "Excelente servicio, el equipo es muy profesional"
                </blockquote>

                <cite class="text-gray-600"> — Adriana García </cite>
            </div>
            </div>
        </div>
    </section>


    <!-- Ubicación y Horarios Section -->
    <section id="ubicacion" class="py-20 bg-[#F5EBDD]">
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <h2 class="text-3xl text-center mb-12 text-gray-800">Ubicación y Horarios</h2>

            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
            <!-- Mapa -->
            <div class="h-full">
                <div class="rounded-xl overflow-hidden shadow-lg h-full">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3701.1656373153182!2d-102.30103272494202!3d21.928182879955894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429ef7ebc133657%3A0x9b6df16ae3385e64!2sBEAUTY%20BONITA!5e0!3m2!1ses!2smx!4v1754612252939!5m2!1ses!2smx" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-full min-h-[400px]"
                ></iframe>
                </div>
            </div>

            <!-- Horarios -->
            <div class="bg-white rounded-xl p-8 shadow-lg h-full">
                <h3 class="text-2xl font-semibold mb-6 text-gray-800">Horario de Atención</h3>

                <div class="space-y-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                    <p class="font-medium text-gray-800">Lunes a Viernes</p>
                    <p class="text-gray-600">11:00 am – 7:00 pm</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                    <p class="font-medium text-gray-800">Sábados</p>
                    <p class="text-gray-600">10:00 am – 6:00 pm</p>
                    </div>
                </div>

                <div class="flex items-center mt-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div>
                    <p class="font-medium text-gray-800">Dirección</p>
                    <p class="text-gray-600">Av Independencia 1928, Col. Trojes de Oriente II, Aguascalientes.</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                    <p class="font-medium text-gray-800">WhatsApp</p>
                    <p class="text-gray-600">+52 449 404 9194</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo -->
            <div class="flex flex-col items-center md:items-start">
                <img 
                src="{{ asset('iconos/logo.png') }}" 
                alt="Beauty Bonita Logo" 
                class="h-24 mb-4"
                >
                <p class="text-center md:text-left italic text-gray-300">
                "Belleza real, resultados visibles"
                </p>
            </div>

            <!-- Menú resumido -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-lg font-semibold mb-4">Navegación</h3>
                <ul class="space-y-2 text-center md:text-left">
                <li><a href="{{ url('/') }}" class="hover:text-amber-300 transition-colors">Inicio</a></li>
                <li><a href="{{ url('#servicios') }}" class="hover:text-amber-300 transition-colors">Servicios</a></li>
                <li><a href="{{ url('#galeria') }}" class="hover:text-amber-300 transition-colors">Portafolio</a></li>
                <li><a href="{{ url('sucursal') }}" class="hover:text-amber-300 transition-colors">Sucursal</a></li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                <div class="flex items-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>449 404 9194</span>
                </div>
                <a 
                href="https://wa.me/524494049194" 
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full flex items-center transition-colors"
                target="_blank"
                rel="noopener noreferrer"
                >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                WhatsApp
                </a>
            </div>

            <!-- Redes sociales -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-lg font-semibold mb-4">Síguenos</h3>
                <div class="flex space-x-4">
                <a href="https://www.facebook.com/share/1FA55smht2/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors" aria-label="Facebook">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors" aria-label="Instagram">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06-4.123v-.08c0-2.643.012-2.987.06-4.043.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 0116.733.525c.636-.247 1.363-.416 2.427-.465C19.9.013 20.256 2 20.685 2h.08zm8.601 3.408a.75.75 0 00-1.06-1.06 7.5 7.5 0 00-10.607 10.607.75.75 0 001.06 1.06 7.5 7.5 0 0010.607-10.607zM12 6a6 6 0 110 12 6 6 0 010-12z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors" aria-label="YouTube">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06-4.123v-.08c0-2.643.012-2.987.06-4.043.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 0116.733.525c.636-.247 1.363-.416 2.427-.465C19.9.013 20.256 2 20.685 2h.08zm8.601 3.408a.75.75 0 00-1.06-1.06 7.5 7.5 0 00-10.607 10.607.75.75 0 001.06 1.06 7.5 7.5 0 0010.607-10.607zM12 6a6 6 0 110 12 6 6 0 010-12z"></path>
                    </svg>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors" aria-label="Twitter">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8.29 16.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                    </svg>
                </a>
                </div>
            </div>
            </div>

            <!-- Derechos reservados -->
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>© 2025 Beauty Bonita - Todos los derechos reservados</p>
            </div>
        </div>
    </footer>

    {{-- JS usando asset() --}}
    <script src="{{ asset('js/interfaz.js') }}"></script>
  </body>
</html>
