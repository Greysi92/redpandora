<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RED SOCIAL PANDORA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/favicon.png') }}" type="image/png">

    <style>
        body {
            background-image: url('https://media.posterlounge.com/img/products/670000/661224/661224_poster.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        /* Fondo blanco semitransparente */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7); /* Color blanco con 70% de opacidad */
            z-index: -1; /* Mantener detrás del contenido */
        }
    </style>
</head>

<body>
<!-- Fondo semitransparente que cubre todo el fondo -->
<div class="overlay"></div>

<header class="p-5 bg-blue-500 bg-opacity-75 relative">
    <div class="container mx-auto flex flex-col items-center">
        <!-- Logo arriba del nombre -->
        <img src="https://media.istockphoto.com/id/1336297157/es/vector/vector-colorido-mapa-del-mundo-mapa-pol%C3%ADtico-sobre-fondo-blanco-plantilla-de-ilustraci%C3%B3n.jpg?s=2048x2048&w=is&k=20&c=LMuivDATESn8omP5VXMagOyF4Qc1CErAJeyGCZIIJM8=" alt="Logo RED SOCIAL PANDORA" class="w-24 h-24 mb-2">
        <a href="{{ url('/') }}" class="text-4xl font-bold text-white">RED SOCIAL PANDORA</a>
    </div>
</header>

<main class="container mx-auto mt-10 flex justify-center items-center relative bg-white bg-opacity-80 p-8 rounded-lg">
    <div class="w-full max-w-lg text-center">
        <h1 class="text-5xl font-bold text-blue-600 mb-6">Bienvenido a RED SOCIAL PANDORA</h1>
        <p class="text-gray-600 text-lg mb-8">Conéctate con tus amigos y el mundo a tu alrededor.</p>
        <div class="flex justify-center gap-6">
            <a href="{{ route('login') }}" class="bg-blue-700 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-800 transition-colors">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="bg-green-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-green-600 transition-colors">Regístrate</a>
        </div>
    </div>
</main>

<footer class="mt-10 text-center p-5 text-blue-500 font-bold uppercase bg-white bg-opacity-80 rounded-lg relative">
    RED SOCIAL PANDORA - Todos los derechos reservados {{ now()->year }}
</footer>
</body>

</html>
