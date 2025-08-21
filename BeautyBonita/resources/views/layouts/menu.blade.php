<header class="header">
    <nav class="nav">
        <!-- Logo -->
        <a href="{{ url('/interfaz') }}">
            <div class="logo">
                <img src="{{ asset('iconos/logo blanco.png') }}" alt="Beauty Logo" class="logo-img">
            </div>
        </a>

        <!-- Botón Móvil -->
        <button id="menu-btn" class="menu-btn rounded-full p-2">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                <ellipse cx="12" cy="20" rx="5" ry="1.2" fill="rgba(0,0,0,0.08)" />
                <rect x="10.5" y="3" width="3" height="6" rx="0.8" fill="#C17B7B" stroke="#5A3E36" stroke-width="0.8" />
                <rect x="10.5" y="9" width="3" height="5" fill="#EED1CC" stroke="#5A3E36" stroke-width="0.8" />
                <rect x="9.8" y="14" width="4.4" height="4" rx="0.8" fill="#9C7C6D" stroke="#5A3E36" stroke-width="0.8" />
            </svg>
        </button>

        <!-- Menú Escritorio -->
        <div class="desktop-menu">
            <a href="{{ url('/interfaz') }}">Inicio</a>
            <a href="{{ url('/servicio') }}">Servicios</a>
            <a href="{{ url('/sucursal') }}">Sucursal</a>
            <a href="{{ url('/reserva') }}">Reserva</a>
        </div>
    </nav>

    <!-- Menú Móvil -->
    <div id="mobile-menu" class="mobile-menu">
        <div class="mobile-menu-content">
            <a href="{{ url('/interfaz') }}">Inicio</a>
            <a href="{{ url('/servicio') }}">Servicios</a>
            <a href="{{ url('/sucursal') }}">Sucursal</a>
            <a href="{{ url('/reserva') }}">Reserva</a>
        </div>
    </div>
</header>
