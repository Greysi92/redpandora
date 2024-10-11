<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <link href="/dist/main.css" rel="stylesheet"> <!-- Enlace a tu hoja de estilos principal -->
    <title>Perfil de Usuario - Red Social Pandora</title>
    <!-- Estilos adicionales -->
    <style>
        body {
            background-color: #18191A; /* Color de fondo similar a Facebook */
            font-family: Arial, sans-serif;
            color: #E4E6EB; /* Color del texto */
        }
        .sidebar, .profile-header, .profile-content, .sidebar-right, .post, .comment-section {
            background-color: #242526; /* Fondo oscuro */
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            background-image: url('https://via.placeholder.com/1200x300'); /* Imagen de portada */
            background-size: cover;
            background-position: center;
            height: 200px;
            position: relative;
        }
        .profile-photo {
            position: absolute;
            bottom: -50px;
            left: 20px;
            border: 5px solid #242526;
            border-radius: 50%;
        }
        .profile-info h2, .profile-info p {
            color: #E4E6EB;
        }
        .btn-primary, .btn-outline-secondary, .btn-danger {
            color: white;
            border-radius: 8px;
            padding: 10px 15px;
        }
        .btn-primary {
            background-color: #1877F2;
            border: none;
        }
        .btn-outline-secondary {
            border-color: #3A3B3C;
            color: #B0B3B8;
        }
        .btn-outline-secondary:hover {
            background-color: #3A3B3C;
            color: #E4E6EB;
        }
        .sidebar .nav-item, .sidebar a {
            color: #B0B3B8;
            text-decoration: none;
            margin-bottom: 10px;
            display: block;
        }
        .sidebar .nav-item:hover, .sidebar a:hover {
            color: #E4E6EB;
        }
        .sidebar h5 {
            margin-bottom: 15px;
        }
        .card {
            background-color: #3A3B3C;
            border: none;
        }
        .card .card-title, .card .card-text, .card h5 {
            color: #E4E6EB;
        }
        .post {
            background-color: #3A3B3C;
            border: none;
            padding: 20px;
            margin-bottom: 20px;
        }
        .post .post-title {
            font-size: 1.2em;
            font-weight: bold;
        }
        .post .post-content {
            margin-top: 10px;
        }
        .comment-section {
            background-color: #3A3B3C;
            padding: 10px;
            border-top: 1px solid #484848;
        }
        .comment-section h6 {
            margin-bottom: 15px;
        }
        .comment {
            background-color: #484848;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<!-- Encabezado superior con portada y foto de perfil -->
<div class="profile-header">
    <img class="profile-photo rounded-circle" src="https://www.clarin.com/img/2024/07/04/uteodLeuh_2000x1500__1.jpg" style="height: 150px; width: 150px;" alt="Foto de perfil">
    <div class="profile-info position-absolute" style="bottom: 20px; left: 180px;">
        <h2 class="fw-bold">Ale Alexander</h2><!--dinamico, mostrar informacion de usuario-->
        <p class="text-muted">451 amigos</p> <!--cambiar a componente dinamico-->
    </div>
</div>

<!-- Contenedor principal -->
<div class="container-fluid">
    <div class="row">
        <!-- Barra lateral izquierda -->
        <div class="col-md-3 sidebar">
            <h5>Información del Perfil</h5>
            <a href="#" class="nav-item"><i class="fas fa-info-circle me-2"></i> Información general</a>
            <a href="#" class="nav-item"><i class="fas fa-briefcase me-2"></i> Empleo y formación</a>
            <a href="#" class="nav-item"><i class="fas fa-user me-2"></i> Información básica y de contacto</a>
            <a href="#" class="nav-item"><i class="fas fa-heart me-2"></i> Información sobre ti</a>
        </div>

        <!-- Sección central del perfil -->
        <div class="col-md-6 profile-content">
            <h3 class="mb-4">Editar Información del Perfil</h3>

            <!-- Formulario de publicación -->
           <!-- <div class="mb-4">
                <form action="/post" method="POST">
                    <div class="mb-3">
                        <textarea class="form-control" name="post_content" rows="3" placeholder="¿Qué estás pensando?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>
            </div>-->

            <!-- Listado de publicaciones -->
            <div class="post">
                <div class="post-title">Ale Alexander</div>
                <div class="post-content">
                    ¡Me siento muy emocionado de estar en esta red social!
                </div>
                <div class="comment-section mt-3">
                    <h6>Comentarios</h6>
                    <div class="comment">
                        <strong>Amigo 1:</strong> ¡Qué bueno verte por aquí!
                    </div>
                    <div class="comment">
                        <strong>Amigo 2:</strong> ¡Bienvenido!
                    </div>
                    <!-- Formulario de comentario -->
                    <form action="/comment" method="POST">
                        <div class="mb-3">
                            <input type="text" name="comment" class="form-control" placeholder="Escribe un comentario...">
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">Comentar</button>
                    </form>
                </div>
            </div>

            <!-- Aquí se pueden repetir más publicaciones y secciones de comentarios -->
        </div>

        <!-- Barra lateral derecha -->
        <div class="col-md-3 sidebar-right">
            <h5>Amigos</h5>
            <p>Aquí se mostrarán tus amigos agregados recientemente</p>
            <!-- Sección dinámica para amigos -->
            <div id="friends-list"></div>
        </div>
    </div>
</div>

<!-- Scripts de JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
