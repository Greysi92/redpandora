<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/main.css" rel="stylesheet"> <!-- Enlace a tu hoja de estilos principal -->
    <title>Confirmación de Contraseña</title>
</head>
<body>
<!-- Componente de Layout de Invitado -->
<x-guest-layout>
    <!-- Contenido del Layout -->
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
            <!-- Título -->
            <h1 class="text-3xl font-bold underline text-center mb-6 text-gray-700 dark:text-gray-100">
                Hello world!
            </h1>

            <!-- Mensaje informativo -->
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.') }}
            </div>

            <!-- Formulario de Confirmación de Contraseña -->
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Campo de Contraseña -->
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 dark:text-gray-300" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Botón de Confirmación -->
                <div class="flex justify-end mt-4">
                    <x-primary-button>
                        {{ __('Confirmar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
</body>
</html>
