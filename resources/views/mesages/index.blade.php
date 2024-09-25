<?php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chat con {{ $user->name }}</h1>

        <!-- Mostrar los mensajes -->
        <div class="mb-4">
            @foreach ($messages as $message)
                <div class="{{ $message->from_user_id == auth()->id() ? 'text-right' : 'text-left' }}">
                    <strong>{{ $message->fromUser->name }}:</strong> {{ $message->message }}
                </div>
            @endforeach
        </div>

        <!-- Formulario para enviar un mensaje -->
        <form action="/messages/{{ $user->id }}" method="POST">
            @csrf
            <textarea name="message" class="form-control" rows="3" placeholder="Escribe tu mensaje..." required></textarea>
            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>
    </div>
@endsection
