<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> <!-- Archivo CSS compilado -->
    <title>@yield('title', 'Perfil de Usuario')</title>
</head>
<body>
@include('layouts.nav') <!-- Si tienes una barra de navegación -->
<div class="container mt-4">
    @yield('content')
</div>
<script src="{{ mix('js/app.js') }}"></script> <!-- Archivo JS compilado -->
</body>
</html>
