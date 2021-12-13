@extends('layouts.app')

@section('title', 'Home')

@section('content')
        @foreach ($posts as $post)
            <div class='container2'>
                <div>
                <img src="{{ asset('images/'.$post->user->id) }}" class="iconDetails">
                </div>  
                <div style='margin-left:20px;'>
                    <p><a href="{{ route('users.show', $post->user) }}" style="display: inline">
                        {{$post->user->name}}</a> ({{ date('d/m/Y H:i', strtotime($post->created_at)) }})</p>

                    <p><a href="{{ route('posts.show', $post) }}">{{$post->title}}</a></b></p>
                </div>
            </div>
            <hr>
        @endforeach
@endsection