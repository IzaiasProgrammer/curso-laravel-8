@extends('admin.layouts.app')

@section('title', 'Listagem dos Posts')

@section('content')
    <a href="{{ route('posts.create') }}">Criar novo post</a>
    <hr>
    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif
    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
        <form action="{{ route('posts.search') }}" method="post">
            @csrf
            <input type="text" name="search" placeholder="Filtrar:">
            <button type="submit">Filtrar</button>
        </form>
    </div>

    <h1 class="text-center text-3x1 uppercase font-black my-4">Post</h1>

    @foreach ($posts as $post)
        <p>
            <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}" style="max-width:100px;">
            {{ $post->title }} | {{ $post->content }}
            [
                <a href="{{ route('posts.show', $post->id) }}">Ver</a> |
                <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
            ]
        </p>
    @endforeach

    <hr>
    @if (isset($filters))
        {{ $posts->appends($filters)->links() }}
    @else
        {{ $posts->links() }}
    @endif

    {{ $posts->links() }}
@endsection
