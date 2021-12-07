@extends('layouts.app')

@section('title', 'Home')

@section('content')
        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('posts.show', $post) }}">{{$post->title}}</a></li>
            @endforeach
        </ul>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="LOGOUT" class="btn btn-primary">
        </form>
@endsection