<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('dist/main.css') }}" rel="stylesheet">
    <title>Lista de Usuarios</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold underline">Hello world!</h1>

        <h2>Lista de Usuarios</h2>
        <ul>
            @foreach($users as $user)
                <li>
                    {{ $user->name }}

                    @if(auth()->user()->id != $user->id)
                        <!-- Verifica si ya se ha enviado una solicitud de amistad -->
                        @if($user->isFriend())
                            <span>Amigos</span>
                        @elseif($user->hasFriendRequestPending())
                            <span>Solicitud pendiente</span>
                        @else
                            <form action="/friends/request/{{ $user->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Enviar solicitud de amistad</button>
                            </form>
                        @endif
                    @endif
                </li>
            @endforeach
        </ul>

        <h2>Solicitudes de Amistad Pendientes</h2>
        @foreach($pendingRequests as $request)
            <div>
                {{ $request->user->name }} te ha enviado una solicitud de amistad
                <form action="/friends/accept/{{ $request->user_id }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Aceptar</button>
                </form>
                <form action="/friends/reject/{{ $request->user_id }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Rechazar</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
</body>
</html>
