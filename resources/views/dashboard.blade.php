@extends('layouts.app')

@section('content')
        <!-- Contenedor de la cabecera del perfil -->
        <div class="position-relative bg-primary" style="height: 300px;">
            <!-- Foto de portada -->
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="position-relative pb-5">
                    <!-- Foto de perfil -->
                    <img class="rounded-circle mt-5 img-fluid" style="height: 220px; width: 220px; margin: 0 auto"
                         src="https://www.clarin.com/img/2024/07/04/uteodLeuh_2000x1500__1.jpg"
                         alt="Foto de perfil">
                </div>
            </div>
        </div>
        <!-- Espaciado para la foto de perfil -->
        <div class="mb-5"></div>
        <!-- Información del usuario -->
        <div class="text-center mt-5">
            <h2 class="fw-bold">{{ __('Nombre del Usuario') }}</h2>
            <p class="text-muted">{{ __('@nombredeusuario') }}</p>
            <p class="text-muted">{{ __('Ciudad, País') }}</p>
        </div>
        <!-- Botones de interacción del perfil -->
        <div class="text-center mt-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2">
                {{__("Editar Perfil")}}
            </a>
            <button class="btn btn-outline-secondary me-2">
                {{ __('Agregar Amigo') }}
            </button>
            <button class="btn btn-outline-secondary">
                {{ __('Mensaje') }}
            </button>
        </div>

        <div class="container mt-5">
            <div class="row">
                <!-- Columna de la izquierda - Información de usuario y amigos -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Amigos Potenciales') }}</h5>
                            <div id="users-list"></div> <!-- Aquí se cargarán los usuarios -->
                        </div>
                    </div>
                </div>

                <!-- Columna de la derecha - Publicaciones -->
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Publicaciones') }}</h5>
                            <div id="posts-list"></div> <!-- Aquí se cargarán las publicaciones -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- JavaScript -->
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
@endsection
