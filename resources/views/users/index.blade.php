<?php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Usuarios</h1>

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
    </div>
@endsection

<div class="container">
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
