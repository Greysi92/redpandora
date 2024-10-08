<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Enlace a Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Enlace a FontAwesome para iconos -->
    <title>Perfil de Usuario - Red Social Pandora</title>
    <!-- Estilos adicionales -->
    <style>
        body {
            background-color: #f0f2f5; /* Color de fondo similar a Facebook */
            font-family: Arial, sans-serif;
        }
        .sidebar-left, .sidebar-right {
            background-color: #fff; /* Fondo blanco para las barras laterales */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 15px;
        }
        .sidebar-left {
            position: sticky;
            top: 20px; /* Mantener fija la barra lateral izquierda */
        }
        .profile-content, .sidebar-left, .sidebar-right {
            margin-top: 20px;
        }
        .profile-header {
            background: url('https://via.placeholder.com/1200x300') no-repeat center center;
            background-size: cover;
            height: 300px;
            position: relative;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .profile-photo {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid white;
            border-radius: 50%;
        }
        .feed {
            margin-top: 30px;
        }
        .card {
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .card .card-body {
            padding: 20px;
        }
        .navbar {
            background-color: #4267B2;
            color: white;
        }
        .navbar .navbar-brand, .navbar .nav-link {
            color: white;
        }
        .navbar .nav-link:hover {
            color: #e4e6eb;
        }
        .btn-primary {
            background-color: #4267B2;
            border: none;
        }
        .btn-primary:hover {
            background-color: #365899;
        }
    </style>
</head>
<body>
<!-- Barra de navegación superior -->
<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Pandora</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
            </ul>
            <!-- Agregar botón de Cerrar Sesión -->
            <form method="POST" action="{{ route('logout') }}" class="d-flex">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <!-- Barra lateral izquierda -->
        <div class="col-md-3 sidebar-left">
            <h5 class="fw-bold">Menú</h5>
            <ul class="list-unstyled">
                <li><i class="fas fa-user-friends me-2"></i> Amigos</li>
                <li><i class="fas fa-clock me-2"></i> Recuerdos</li>
                <li><i class="fas fa-bookmark me-2"></i> Guardado</li>
                <li><i class="fas fa-users me-2"></i> Grupos</li>
                <li><i class="fas fa-video me-2"></i> Videos</li>
                <li><i class="fas fa-store me-2"></i> Marketplace</li>
            </ul>
        </div>

        <!-- Contenido del feed principal -->
        <div class="col-md-6 profile-content">
            <!-- Encabezado del perfil -->
            <div class="profile-header">
                <img class="profile-photo rounded-circle" src="https://www.clarin.com/img/2024/07/04/uteodLeuh_2000x1500__1.jpg" style="height: 150px; width: 150px;" alt="Foto de perfil">
            </div>

            <!-- Información del usuario -->
            <div class="text-center">
                <h2 class="fw-bold">{{ __('Nombre del Usuario') }}</h2>
                <p class="text-muted">{{ __('@nombredeusuario') }}</p>
                <p class="text-muted">{{ __('Ciudad, País') }}</p>
            </div>

            <!-- Botones de interacción -->
            <div class="text-center mb-4">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2">
                    {{ __("Editar Perfil") }}
                </a>
                <button class="btn btn-secondary me-2">
                    {{ __('Agregar Amigo') }}
                </button>
                <button class="btn btn-secondary">
                    {{ __('Mensaje') }}
                </button>
            </div>

            <!-- Feed de publicaciones -->
            <div class="feed">
                <div id="posts-list"></div> <!-- Aquí se cargarán las publicaciones -->
            </div>
        </div>

        <!-- Barra lateral derecha -->
        <div class="col-md-3 sidebar-right">
            <h5 class="fw-bold">Solicitudes de amistad</h5>
            <div id="users-list"></div> <!-- Aquí se cargarán los usuarios -->
        </div>
    </div>
</div>

<!-- Scripts de JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cargar usuarios para agregar como amigos
        fetch('/friends/potential')
            .then(response => response.json())
            .then(data => {
                let usersContainer = document.getElementById('users-list');
                usersContainer.innerHTML = '';

                data.forEach(user => {
                    usersContainer.innerHTML += `
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5>${user.name}</h5>
                                <p>${user.email}</p>
                                <button class="btn btn-outline-primary" onclick="sendFriendRequest(${user.id})">Agregar Amigo</button>
                            </div>
                        </div>`;
                });
            });

        // Cargar publicaciones
        fetch('/posts')
            .then(response => response.json())
            .then(data => {
                let postsContainer = document.getElementById('posts-list');
                postsContainer.innerHTML = '';

                data.forEach(post => {
                    postsContainer.innerHTML += `
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://via.placeholder.com/40" alt="User avatar">
                                    <div>
                                        <h6 class="fw-bold">${post.user.name}</h6>
                                        <small class="text-muted">Publicado el ${new Date(post.created_at).toLocaleDateString()}</small>
                                    </div>
                                </div>
                                <p class="mt-3">${post.content}</p>
                                <div class="d-flex justify-content-start mt-3">
                                    <button class="btn btn-link text-primary me-3">
                                        <i class="far fa-thumbs-up">Me gusta</i>
                                    </button>
                                    <button class="btn btn-link text-primary">
                                        <i class="fas fa-comment-dots"> Comentar</i>
                                    </button>
                                </div>
                            </div>
                        </div>`;
                });
            });
    });

    // Función para enviar solicitud de amistad
    function sendFriendRequest(userId) {
        fetch(`/friends/request/${userId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
            });
    }
</script>
</body>
</html>
