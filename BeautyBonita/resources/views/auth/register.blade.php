<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Beauty Bonita</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-beige font-montas flex items-center justify-center min-h-screen">

    <section class="bg-beige min-h-screen flex items-center justify-center font-montas">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            <!-- Logo y título -->
            <div class="text-center mb-6">
                <img src="{{ asset('iconos/logo blanco.png') }}" alt="Beauty Bonita" class="mx-auto h-16 mb-2">
                <h2 class="text-2xl font-bold text-gray-800">Registro de Cliente</h2>
                <p class="text-gray-600 text-sm mt-1">Crea tu cuenta para agendar citas</p>
            </div>

            <!-- Mensaje de error -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-center">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario -->
            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre completo</label>
                    <input type="text" name="name" id="name" required
                        class="w-full mt-1 border-gray-300 rounded-xl shadow-sm p-3 focus:ring focus:ring-[#999189] focus:border-[#999189]">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <input type="email" name="email" id="email" required
                        class="w-full mt-1 border-gray-300 rounded-xl shadow-sm p-3 focus:ring focus:ring-[#999189] focus:border-[#999189]">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" required
                        class="w-full mt-1 border-gray-300 rounded-xl shadow-sm p-3 focus:ring focus:ring-[#999189] focus:border-[#999189]">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full mt-1 border-gray-300 rounded-xl shadow-sm p-3 focus:ring focus:ring-[#999189] focus:border-[#999189]">
                </div>

                <button type="submit"
                    class="w-full bg-[#999189] text-white py-3 rounded-xl font-semibold hover:bg-[#c8c2bc] transition-colors">
                    Registrarse
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                ¿Ya tienes cuenta?
                <a href="{{ route('login.form') }}" class="text-[#999189] font-medium hover:text-[#c8c2bc] underline">Inicia sesión</a>
            </p>
        </div>
    </section>

</body>
</html>
