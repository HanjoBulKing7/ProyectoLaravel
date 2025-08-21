<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago de Anticipo - Beauty Bonita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Anticipo.css') }}">
</head>
<body class="bg-[#eee7df]">

    <!-- Header -->
    <header class="bg-[#c8c2bc] text-white py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <img src="{{ asset('iconos/logo blanco.png') }}" alt="Beauty Bonita Logo" class="h-12">
            <nav class="hidden md:flex space-x-8">
                <a href="{{ url('/') }}" class="hover:text-rose-300 transition-colors">Inicio</a>
                <a href="#servicios" class="hover:text-rose-300 transition-colors">Servicios</a>
                <a href="#contacto" class="hover:text-rose-300 transition-colors">Contacto</a>
            </nav>
        </div>
    </header>

    <!-- Pago Section -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Confirma tu reserva</h1>
                <p class="text-lg text-gray-600">Se requiere un anticipo de $200 MXN para garantizar tu cita</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg overflow-hidden p-8">
                <!-- Resumen de Reserva -->
                <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Detalles de tu reserva</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600">Servicio:</p>
                            <p class="font-medium" id="servicio-resumen">Maquillaje profesional</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Estilista:</p>
                            <p class="font-medium" id="estilista-resumen">María González</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Fecha:</p>
                            <p class="font-medium" id="fecha-resumen">15 de junio, 2024</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Hora:</p>
                            <p class="font-medium" id="hora-resumen">10:30 AM</p>
                        </div>
                    </div>
                </div>

                <!-- Monto del Anticipo -->
                <div class="mb-8 text-center">
                    <div class="inline-block border-2 border-rose-500 rounded-full px-8 py-4">
                        <p class="text-gray-600">Monto del anticipo:</p>
                        <p class="text-3xl font-bold text-rose-600">$200 MXN</p>
                    </div>
                </div>

                <!-- Métodos de Pago -->
                <div>
                    <h3 class="text-xl font-semibold mb-6 text-gray-800">Selecciona método de pago</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tarjeta -->
                        <div class="payment-card border border-gray-200 rounded-lg p-6 cursor-pointer bg-white hover:border-rose-300">
                            <div class="flex items-center mb-4">
                                <input type="radio" name="metodo-pago" id="tarjeta" class="mr-3" checked>
                                <label for="tarjeta" class="font-medium">Tarjeta de crédito/débito</label>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label for="numero-tarjeta" class="block text-sm text-gray-600 mb-1">Número de tarjeta</label>
                                    <input type="text" id="numero-tarjeta" placeholder="1234 5678 9012 3456" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="fecha-exp" class="block text-sm text-gray-600 mb-1">Expiración</label>
                                        <input type="text" id="fecha-exp" placeholder="MM/AA" 
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                                    </div>
                                    <div>
                                        <label for="cvv" class="block text-sm text-gray-600 mb-1">CVV</label>
                                        <input type="text" id="cvv" placeholder="123" 
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                                    </div>
                                </div>
                                <div>
                                    <label for="nombre-tarjeta" class="block text-sm text-gray-600 mb-1">Nombre en la tarjeta</label>
                                    <input type="text" id="nombre-tarjeta" placeholder="Nombre completo" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500">
                                </div>
                            </div>
                        </div>

                        <!-- Transferencia -->
                        <div class="payment-card border border-gray-200 rounded-lg p-6 cursor-pointer bg-white hover:border-rose-300">
                            <div class="flex items-center mb-4">
                                <input type="radio" name="metodo-pago" id="transferencia" class="mr-3">
                                <label for="transferencia" class="font-medium">Transferencia bancaria</label>
                            </div>
                            <div class="space-y-4 text-sm text-gray-600">
                                <p>Realiza tu transferencia a:</p>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="font-medium">Banco: BBVA</p>
                                    <p class="font-medium">CLABE: 0123 4567 8910 1112 13</p>
                                    <p class="font-medium">Titular: Beauty Bonita S.A. de C.V.</p>
                                </div>
                                <p>Una vez realizado el pago, envía tu comprobante por WhatsApp al 55-1234-5678</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Términos y condiciones -->
                <div class="mt-8 flex items-start">
                    <input type="checkbox" id="terminos" class="mt-1 mr-3">
                    <label for="terminos" class="text-sm text-gray-600">
                        Acepto los <a href="#" class="text-rose-600 hover:underline">términos y condiciones</a> y 
                        <a href="#" class="text-rose-600 hover:underline">política de cancelación</a>.
                        El anticipo no es reembolsable en caso de no presentarse a la cita.
                    </label>
                </div>

                <!-- Botón de Pago -->
                <div class="mt-8 flex justify-center">
                    <button id="realizar-pago" class="btn-pago">
                        Realizar Pago de $200 MXN
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Pago Exitoso -->
    <div id="pago-exitoso" class="modal">
        <div class="modal-contenido">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">¡Pago Exitoso!</h3>
            <p class="text-gray-600 mb-6">Tu anticipo de $200 MXN se ha procesado correctamente.</p>
            <button id="cerrar-modal" class="btn-cerrar">
                Aceptar
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#c8c2bc] text-white py-8">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <p>© 2025 Beauty Bonita - Todos los derechos reservados</p>
        </div>
    </footer>

    <script src="{{ asset('js/Anticipo.js') }}"></script>
</body>
</html>
