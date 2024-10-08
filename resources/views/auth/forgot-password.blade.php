<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/main.css" rel="stylesheet"> <!-- Asegúrate de que este enlace cargue tus estilos de CSS -->
    <style>
        /* Fondo personalizado */
        .bg-cover-custom {
            background-image: url('https://p4.wallpaperbetter.com/wallpaper/338/727/578/technology-instagram-social-media-hd-wallpaper-preview.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh; /* Ocupa toda la altura de la pantalla */
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative; /* Posición relativa para contener el logo */
        }

        /* Estilo adicional para el formulario */
        .form-container {
            background: rgba(255, 255, 255, 0.8); /* Fondo blanco translúcido */
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px; /* Ancho máximo */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); /* Sombra */
        }

        /* Estilo de los encabezados */
        h1, h2 {
            color: #1a202c;
        }

        /* Botón personalizado */
        .btn-primary {
            background-color: #1d4ed8; /* Color azul */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
        }
        .btn-primary:hover {
            background-color: #2563eb; /* Cambio de color en hover */
        }

        .text-center {
            text-align: center;
        }

        /* Estilo del logo */
        .logo {
            position: absolute;
            top: 20px; /* Ajuste de la posición del logo */
            right: 20px;
            width: 250px; /* Ancho */
            height: 251px; /* Altura */
            object-fit: contain; /* Mantener proporción del logo */
            border-radius: 10px; /* Bordes redondeados */
        }
    </style>
    <title>Restablecer Contraseña</title>
</head>
<body>
<div class="bg-cover-custom">
    <!-- Logo de la empresa/organización -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Escudo_de_la_universidad_Mariano_G%C3%A1lvez_Guatemala.svg/250px-Escudo_de_la_universidad_Mariano_G%C3%A1lvez_Guatemala.svg.png" class="logo" alt="Logo">

    <!-- Contenedor principal del formulario -->
    <div class="form-container">
        <h1 class="text-3xl font-bold underline text-center mb-6">
            Restablecer Contraseña
        </h1>

        <!-- Mensaje informativo -->
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            ¿Olvidaste tu contraseña? No hay problema. Solo dinos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña que te permitirá crear una nueva.
        </div>

        <!-- Estado de la sesión (si existe) -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Formulario de restablecimiento de contraseña -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Campo de dirección de correo electrónico -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Botón de envío del formulario -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn-primary">
                    Enviar Enlace de Restablecimiento de Contraseña
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
