<?php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PANDORA - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <header class="p-5 bg-blue-600">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-4xl font-bold text-white">RED SOCIAL PANDORA</a>
            <div class="flex gap-4 items-center">
                <div>
                    <input type="email" placeholder="Correo electrónico" class="px-3 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <input type="password" placeholder="Contraseña" class="px-3 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-800 transition-colors">Iniciar Sesión</button>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto mt-10 flex justify-between items-center">
        <div class="w-full max-w-lg">
            <h1 class="text-5xl font-bold text-blue-600 mb-6">Conéctate con tus amigos y el mundo a tu alrededor.</h1>
            <p class="text-gray-600 text-lg">PANDORA te permite mantenerte en contacto con todos de manera fácil y divertida.</p>
        </div>
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Regístrate</h2>
            <form method="POST" action="#">
                <div class="mb-4">
                    <input type="text" name="name" placeholder="Nombre completo" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Correo electrónico" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="mb-4">
                    <input type="password" name="password" placeholder="Contraseña" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="mb-4">
                    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-bold text-sm uppercase hover:bg-blue-700 transition-colors">Registrarse</button>
                </div>
            </form>
            <p class="text-center text-gray-600 text-sm mt-6">¿Ya tienes una cuenta?
                <a href="#" class="text-blue-600 hover:underline">Inicia Sesión</a>
            </p>
        </div>
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
RED SOCIAL PANDORA - Todos los derechos reservados {{ now()->year }}
    </footer>

</body>

</html>
