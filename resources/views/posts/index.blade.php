@extends('layouts.app')

@section('title', 'Home')

@section('content')
        @foreach ($posts as $post)
            <p><a href="">{{$post->user->name}}</a></p>
            <p><b><a href="{{ route('posts.show', $post) }}">{{$post->title}}</a></b></p>
            <hr>
        @endforeach

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="LOG OUT" class="btn btn-primary">
        </form>
@endsection