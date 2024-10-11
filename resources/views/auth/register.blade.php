<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('dist/main.css') }}" rel="stylesheet"> <!-- Mantener la ruta de tu CSS principal -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kMVq2v2Yf2AQjdjygW1yZYQ5l7FYFfzEq8Cj/TBLazSDIGw3T2h+E9AaZ9z1koec6wixZC5b4cYvA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- Font Awesome -->
    <title>Registro - Red Social Pandora</title>
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
        input[type="password"]
        select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #dddfe2;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
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

        .password-help {
            color: #888; /* Color gris */
            font-size: 0.9em; /* Tamaño de fuente más pequeño */
            margin-top: 5px; /* Espaciado superior */
        }


        .primary-button:hover {
            background-color: #3b42b1;
        }

        /* Enlace de redirección a login */
        .login-link {
            text-align: center;
            display: block;
            margin-top: 20px;
            color: #4e54c8;
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
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        /* Estilo para el logo */
        .logo {
            position: absolute;<
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

    <!-- Contenedor del formulario -->
    <div class="container">
        <h1>Registrate en nuestra Red Social Pandora¡</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nombre completo" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <!-- Correo Electrónico -->
            <div>
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="correo@ejemplo.com" />
                <x-input-error :messages="$errors->get('email')" />
            </div>
            <!--Pais-->
            <div>
                <label for="country">País</label>
                <select id="country" name="country" required>
                    <option value="" disabled selected>Selecciona tu país</option>
                </select>
                <x-input-error :messages="$errors->get('ciudad')" />
            </div>

             <!--Ciudad-->
             <div>
                <label for="city">Ciudad</label>
                <select id="city" name="city" required>
                    <option value="" disabled selected>Selecciona tu ciudad</option>
                </select>
                <x-input-error :messages="$errors->get('ciudad')" />
            </div>

            <!-- Contraseña -->
            <div class="password-wrapper">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Contraseña" />
                <i class="fas fa-eye" id="togglePassword"></i>
                <x-input-error :messages="$errors->get('password')" />
                <span class="password-help" id="passwordHelp" style="display: none;">Debes crear una contraseña con 8 caracteres, 1 mayúscula, 1 número y 1 carácter especial.</span>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="password-wrapper">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repite la contraseña" />
                <i class="fas fa-eye" id="toggleConfirmPassword"></i>
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <!-- Botón de Registro -->
            <div>
                <button class="primary-button" type="submit">
                    Registrar
                </button>
            </div>

            <!-- Enlace a login -->
            <a class="login-link" href="{{ route('login') }}">
                ¿Ya tienes cuenta? Inicia sesión
            </a>
        </form>
    </div>
</div>

<!-- Agregar FontAwesome para el ícono de ojo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-G+tn1D1cRzjbOEELK83tv4U27U5u/9kY5Jr2vNYys0E9QRlDgO3Q2EYdxqqzz7Djo9S0P0WZQaz0tv0xJiI7jQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Funcionalidad para mostrar/ocultar la contraseña -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const confirmPassword = document.querySelector('#password_confirmation');
    toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const passwordHelp = document.getElementById('passwordHelp');

    // Mostrar el mensaje al pasar el mouse
    passwordInput.addEventListener('mouseover', function() {
        passwordHelp.style.display = 'block';
    });

    // Ocultar el mensaje al salir el mouse
    passwordInput.addEventListener('mouseout', function() {
        passwordHelp.style.display = 'none';
    });
});
</script>

<!--Código para selección de pais y ciudad-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const countrySelect = document.getElementById('country');
      const citySelect = document.getElementById('city');

      countrySelect.innerHTML = '<option value="" disabled selected>Selecciona tu pais</option>';
  
      fetch('/country-city.json')
        .then(response => {
          if (!response.ok) {
            throw new Error('Error al cargar el archivo JSON');
          }
          return response.json();
        })
        .then(data => {
          
          if (data && typeof data === 'object') {
            for (let country in data) {
              const option = document.createElement('option');
              option.value = country;
              option.text = country;
              countrySelect.appendChild(option);
            }
          } else {
            console.error('Formato JSON inválido o sin datos');
          }
        })
        .catch(error => {
          console.error('Error al cargar el archivo JSON:', error);
        });
  
      
      countrySelect.addEventListener('change', function() {
        const selectedCountry = this.value;
  
        
        citySelect.innerHTML = '<option value="" disabled selected>Selecciona tu ciudad</option>';
  
        fetch('/country-city.json')
          .then(response => response.json())
          .then(data => {
            const cities = data[selectedCountry];
            
            // Agregar las ciudades del país seleccionado
            if (cities) {
              cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.text = city;
                citySelect.appendChild(option);
              });
            }
          })
          .catch(error => console.error('Error al cargar las ciudades:', error));
      });
    });
  </script>
  
  

</body>
</html>
