<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/main.css" rel="stylesheet"> <!-- Asegúrate de que este enlace cargue tus estilos de CSS -->
    <title>Verificación de Correo Electrónico</title>
</head>
<body>
<!-- Encabezado inicial -->
<h1 class="text-3xl font-bold underline text-center my-4">
    Hello world!
</h1>

<!-- Layout de Laravel Blade con el Componente de Verificación de Correo -->
<x-guest-layout>
    <!-- Contenedor Principal -->
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
            <!-- Mensaje informativo -->
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que te enviamos por correo? Si no recibiste el correo, con gusto te enviaremos otro.') }}
            </div>

            <!-- Mensaje de confirmación de envío de enlace -->
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('Un nuevo enlace de verificación ha sido enviado a la dirección de correo que proporcionaste durante el registro.') }}
                </div>
            @endif

            <!-- Formulario para reenviar el enlace de verificación -->
            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('Reenviar Correo de Verificación') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Formulario para cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Cerrar Sesión') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
</body>
</html>
