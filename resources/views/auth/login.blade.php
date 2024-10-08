<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('dist/main.css') }}" rel="stylesheet"> <!-- Ruta al CSS principal de tu proyecto -->
    <!-- Carga de FontAwesome desde un CDN confiable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-jLKHWMj3sjy6YJV0sqreTN5sVTO4hg6vNcZ7ll9wFTQ3lt7hq4mK9i2v9ksCt4ym" crossorigin="anonymous">
    <title>Inicio de Sesión - Red Social Pandora</title>
    <style>
        /* Estilo general para Pandora */
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Contenedor principal con imagen de fondo */
        .bg-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('https://p4.wallpaperbetter.com/wallpaper/338/727/578/technology-instagram-social-media-hd-wallpaper-preview.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* Contenedor del formulario */
        .container {
            width: 100%;
            max-width: 400px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        /* Estilos para el título */
        h1 {
            text-align: center;
            color: #4e54c8;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Estilo para las etiquetas de entrada */
        label {
            font-size: 14px;
            color: #4b4f56;
            margin-bottom: 5px;
            display: block;
        }

        /* Estilo para los campos de texto */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #dddfe2;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Mensajes de error */
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            display: none;
        }

        /* Botón primario */
        .primary-button {
            width: 100%;
            padding: 12px;
            background-color: #4e54c8;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
        }

        .primary-button:hover {
            background-color: #3b42b1;
        }

        /* Enlaces de redirección */
        .register-link, .forgot-password-link {
            text-align: center;
            display: block;
            margin-top: 15px;
            color: #4e54c8;
            font-size: 14px;
        }

        .register-link:hover, .forgot-password-link:hover {
            text-decoration: underline;
        }

        /* Estilo para el campo de contraseña con ojito */
        .password-wrapper {
            position: relative;
        }

        .password-wrapper i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #4e54c8;
        }

        /* Estilo para el logo */
        .logo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 250px;
            height: 251px;
        }
    </style>
</head>
<body>
<!-- Contenedor principal para centrar el contenido -->
<div class="bg-container">
    <!-- Logo de la Universidad en la esquina superior derecha -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Escudo_de_la_universidad_Mariano_G%C3%A1lvez_Guatemala.svg/250px-Escudo_de_la_universidad_Mariano_G%C3%A1lvez_Guatemala.svg.png" class="logo" alt="Logo Universidad">

    <!-- Contenedor del formulario de inicio de sesión -->
    <div class="container">
        <h1>Red Social Pandora - Inicio de Sesión</h1>

        <!-- Mensaje de error general -->
        @if($errors->any())
            <div class="error-message">
                <strong>Las credenciales no coinciden o son incorrectas. Por favor, intenta nuevamente.</strong>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo Electrónico -->
            <div>
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="correo@ejemplo.com" />
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="password-wrapper">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Contraseña" />
                <!-- Ícono de ojo para mostrar/ocultar la contraseña -->
                <i class="far fa-eye" id="togglePassword"></i>
                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Recordar usuario -->
            <div>
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded text-blue-500 focus:ring-blue-400" name="remember">
                    <span class="ml-2 text-gray-600">Recordar sesión</span>
                </label>
            </div>

            <!-- Botón de inicio de sesión -->
            <div>
                <button class="primary-button" type="submit">
                    Iniciar Sesión
                </button>
            </div>

            <!-- Enlace a recuperar contraseña -->
            <a class="forgot-password-link" href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
            </a>

            <!-- Enlace a registro -->
            <a class="register-link" href="{{ route('register') }}">
                ¿No tienes cuenta? Regístrate
            </a>
        </form>
    </div>
</div>

<!-- Agregar FontAwesome para el ícono de ojo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha384-rOA8B1y1UczzR2+ht7jp2K18F3v3BS3vboKg6R2IuqHpOp9aaYl0CU0R8H16PQ+L" crossorigin="anonymous"></script>

<!-- Funcionalidad para mostrar/ocultar la contraseña -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        // Alternar el tipo de input entre texto y contraseña
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // Alternar el ícono del ojo
        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    // Mostrar mensaje de error si existen errores
    @if($errors->any())
    document.querySelector('.error-message').style.display = 'block';
    @endif
</script>
</body>
</html>
