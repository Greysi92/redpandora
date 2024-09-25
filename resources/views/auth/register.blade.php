<x-guest-layout>
    <style>
        /* Estilo general para Pandora */
        body {
            background-color: #e9ebee;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Estilos para el título */
        h1 {
            text-align: center;
            color: #3b5998;
            font-size: 24px;
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
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #dddfe2;
            border-radius: 6px;
            font-size: 14px;
        }

        /* Botón primario */
        .primary-button {
            width: 100%;
            padding: 10px;
            background-color: #1877f2;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
        }

        .primary-button:hover {
            background-color: #155cb0;
        }

        /* Enlace de redirección a login */
        .login-link {
            text-align: center;
            display: block;
            margin-top: 20px;
            color: #1877f2;
            font-size: 14px;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        /* Estilo para el campo de contraseña con ojito */
        .password-wrapper {
            position: relative;
        }

        .password-wrapper i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

    <div class="container">
        <h1>Red Social Pandora</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="password-wrapper">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" />
                <i class="fas fa-eye" id="togglePassword"></i>
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Confirm Password -->
            <div class="password-wrapper">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                <i class="fas fa-eye" id="toggleConfirmPassword"></i>
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <!-- Submit Button -->
            <div>
                <button class="primary-button">
                    {{ __('Register') }}
                </button>
            </div>

            <!-- Already registered link -->
            <a class="login-link" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </form>
    </div>

    <!-- Agregar FontAwesome para el ícono de ojo -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        // Funcionalidad para mostrar/ocultar la contraseña
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Alternar el tipo de input entre texto y contraseña
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Alternar el ícono del ojo
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Funcionalidad para confirmar la contraseña
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#password_confirmation');

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</x-guest-layout>
