@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edita tu perfil</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="contain-content pd-6">
        <form class="mx-auto" action="{{ route('profile.update') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')


            <div class="mb-4 mx-2">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{__('Nombre')}}</label>
                <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $user->name) }}">
                @error('name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 mx-2">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{__('Correo Electrónico')}}</label>
                <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('email', $user->email) }}">
                @error('email')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 ms-2 mx-2">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{__('Contraseña')}}</label>
                <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 ms-2mx-2">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">{{__('Confirmar Contraseña')}}</label>
                <input type="password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between mb-5">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                   {{__('Actualizar Perfil')}}
                </button>
            </div>
        </form>

        <form action="{{ route('profile.delete') }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')

            <button type="submit" class="bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Eliminar Cuenta
            </button>
        </form>
        </div>
    </div>
@endsection
