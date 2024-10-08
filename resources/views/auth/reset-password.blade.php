<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/main.css" rel="stylesheet"> <!-- Asegúrate de que este enlace cargue tus estilos de CSS -->
    <title>Restablecer Contraseña</title>
</head>
<body>
<!-- Encabezado inicial -->
<h1 class="text-3xl font-bold underline text-center my-4">
    Hello world!
</h1>

<!-- Layout de Laravel Blade con el Formulario -->
<x-guest-layout>
    <!-- Contenedor principal del formulario -->
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
            <!-- Título del Formulario -->
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-700 dark:text-gray-100">
                Restablecer Contraseña
            </h2>

            <!-- Formulario de Restablecimiento de Contraseña -->
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Token de Restablecimiento de Contraseña -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Campo de Dirección de Correo Electrónico -->
                <div>
                    <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Campo de Contraseña -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>

                <!-- Botón de Envío -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        {{ __('Restablecer Contraseña') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
</body>
</html>
