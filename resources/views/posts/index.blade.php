@extends('layouts.app')

@section('title', 'Home')

@section('content')
        @foreach ($posts as $post)
            <div class='container2'>

                <div>
                    <img src='http://ecx.images-amazon.com/images/I/21-leKb-zsL._SL500_AA300_.png' class='iconDetails'>
                </div>  
                <div style='margin-left:80px;'>
                    <p><a href="{{ route('users.show', $post->user) }}" style="display: inline">{{$post->user->name}}</a> ({{ $post->created_at }})</p>
                    <p><a href="{{ route('posts.show', $post) }}">{{$post->title}}</a></b></p>
                </div>
            </div>
            <hr>
        @endforeach

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="LOG OUT" class="btn btn-primary">
        </form>
@endsection