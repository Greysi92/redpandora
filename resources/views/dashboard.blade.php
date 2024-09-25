<x-app-layout>
    <x-slot name="header">
        <!-- Contenedor de la cabecera del perfil -->
        <div class="relative bg-blue-600 h-60">
            <!-- Foto de portada -->
            <div class="absolute inset-0 flex justify-center items-center">
                <div class="relative">
                    <!-- Foto de perfil -->
                    <img class="w-36 h-36 rounded-full ring-4 ring-white dark:ring-gray-800 absolute -bottom-18"
                         src="https://via.placeholder.com/150"
                         alt="Foto de perfil">
                </div>
            </div>
        </div>
        <!-- Espaciado para la foto de perfil -->
        <div class="h-24"></div>
        <!-- Información del usuario -->
        <div class="flex flex-col items-center mt-8">
            <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nombre del Usuario') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('@nombredeusuario') }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Ciudad, País') }}</p>
        </div>
        <!-- Botones de interacción del perfil -->
        <div class="flex justify-center space-x-4 mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Editar Perfil') }}
            </button>
            <button class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 font-bold py-2 px-4 rounded">
                {{ __('Agregar Amigo') }}
            </button>
            <button class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 font-bold py-2 px-4 rounded">
                {{ __('Mensaje') }}
            </button>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Columna de la izquierda - Información de usuario -->
                <div class="col-span-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                        {{ __('Información de Contacto') }}
                    </h3>
                    <ul class="mt-4 space-y-2">
                        <li class="text-gray-600 dark:text-gray-400">{{ __('Email: usuario@example.com') }}</li>
                        <li class="text-gray-600 dark:text-gray-400">{{ __('Teléfono: +1 234 567 890') }}</li>
                    </ul>
                    <hr class="my-6 border-gray-200 dark:border-gray-600">
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                        {{ __('Amigos') }}
                    </h3>
                    <div class="mt-4 grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <img class="w-16 h-16 rounded-full mx-auto" src="https://via.placeholder.com/64" alt="Amigo 1">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Amigo 1</p>
                        </div>
                        <div class="text-center">
                            <img class="w-16 h-16 rounded-full mx-auto" src="https://via.placeholder.com/64" alt="Amigo 2">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Amigo 2</p>
                        </div>
                        <div class="text-center">
                            <img class="w-16 h-16 rounded-full mx-auto" src="https://via.placeholder.com/64" alt="Amigo 3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Amigo 3</p>
                        </div>
                    </div>
                </div>

                <!-- Columna de la derecha - Publicaciones -->
                <div class="col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                        {{ __('Publicaciones') }}
                    </h3>
                    <!-- Ejemplo de una publicación -->
                    <div class="mt-6 bg-white dark:bg-gray-900 p-4 rounded-lg shadow-md">
                        <div class="flex items-center space-x-4">
                            <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User avatar">
                            <div>
                                <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Usuario Amigo</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Publicado el 20 de septiembre</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-600 dark:text-gray-300">Este es un ejemplo de una publicación de texto que aparecería en el perfil del usuario. Los amigos pueden comentar, darle "Me gusta", etc.</p>
                        </div>
                        <!-- Botones de interacción -->
                        <div class="flex space-x-4 mt-4">
                            <button class="flex items-center text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 8a4 4 0 118 0H3z" />
                                </svg>
                                {{ __('Me gusta') }}
                            </button>
                            <button class="flex items-center text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM9 11V9H7v2h2zm0 4v-2H7v2h2z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Comentar') }}
                            </button>
                        </div>
                    </div>
                    <!-- Más publicaciones -->
                    <div class="mt-6 bg-white dark:bg-gray-900 p-4 rounded-lg shadow-md">
                        <!-- Otra publicación de ejemplo -->
                        <div class="flex items-center space-x-4">
                            <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User avatar">
                            <div>
                                <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Usuario Amigo</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Publicado el 18 de septiembre</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-600 dark:text-gray-300">Otra publicación de ejemplo que podría aparecer en este perfil. Más interacciones con amigos, como comentarios, me gusta, etc.</p>
                        </div>
                        <div class="flex space-x-4 mt-4">
                            <button class="flex items-center text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 8a4 4 0 118 0H3z" />
                                </svg>
                                {{ __('Me gusta') }}
                            </button>
                            <button class="flex items-center text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM9 11V9H7v2h2zm0 4v-2H7v2h2z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Comentar') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
