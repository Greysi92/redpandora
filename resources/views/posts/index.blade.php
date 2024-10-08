@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Publicaciones</h1>

        <!-- Formulario para crear una nueva publicación -->
        <form action="/posts" method="POST">
            @csrf
            <textarea name="content" class="form-control" rows="3" placeholder="¿Qué estás pensando?" required></textarea>
            <button type="submit" class="btn btn-primary mt-3">Publicar</button>
        </form>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="content" class="form-control" rows="2" placeholder="Escribe un comentario..." required></textarea>
            <button type="submit" class="btn btn-secondary mt-2">Comentar</button>
        </form>


        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <textarea name="content" class="form-control" rows="3" placeholder="¿Qué estás pensando?" required></textarea>
            <button type="submit" class="btn btn-primary mt-3">Publicar</button>
        </form>

        <!-- Formulario para comentar -->
        <form action="/comments" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="content" class="form-control" rows="2" placeholder="Escribe un comentario..." required></textarea>
            <button type="submit" class="btn btn-secondary mt-2">Comentar</button>
        </form>

        <!-- Mostrar comentarios -->
        @foreach ($post->comments as $comment)
            <div class="ml-4 mt-2">
                <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                <p class="text-muted">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        @endforeach


        <!-- Mostrar publicaciones -->
        <div class="mt-4">
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->user->name }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
