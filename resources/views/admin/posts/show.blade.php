@extends('admin.layouts.app')

@section('title', 'Detalhes do Post')

@section('content')
    <h1 class="text-center text-3x1 uppercase font-black my-4">Detalhe do Post {{ $post->title }}</h1>

    <ul>
        <li><strong>Titulo: </strong> {{ $post->title }} </li>
        <li><strong>Conteudo: </strong> {{ $post->content }} </li>
    </ul>

    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">Deletar o post: {{ $post->title }}</button>
        </form>
    </div>

@endsection
