@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <!-- POST -->
    <p><a href="" style="display: inline">{{$post->user->name}}</a> ({{ $post->created_at }})</p>
    <p>{{ $post-> body }}</p>

    <form method="POST" action="{{ route('posts.destroy', $post) }}">
        @csrf
        <a href="{{ route('posts.edit', $post) }}">EDIT</a>
        @method('DELETE')
        <input type="submit" value="DELETE" class="btn btn-primary">
    </form>

    <hr>

    <!-- COMMENTS -->

    @foreach ($post->comments as $comment) 
        <p><a href="" style="display: inline">{{$comment->user->name}}</a> ({{ $comment->created_at }})</p>
        <p>{{ $comment-> text }}</p>
        <hr>
    @endforeach

    <!-- LEAVING A COMMENT -->

    <p><b>Leave a comment!</b></p>
            
    <form method="POST" action="{{ route('comments.store', $post) }}">
        @csrf
        <p><textarea name="text" rows="4" cols="30">{{ old('text') }}</textarea></p>
        <input type="submit" value="SUBMIT" class="btn btn-primary">
        <hr>
    </form>

@endsection