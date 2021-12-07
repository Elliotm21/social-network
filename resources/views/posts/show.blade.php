@extends('layouts.app')

@section('title', 'Post Details')

@section('content')

    <!-- POST -->

    <p><b>{{ $post-> title }}</b></p>
    <p>{{ $post-> body }}</p>
    <p>- {{ $post->user->name }} ({{ $post->created_at }})</p>

    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="DELETE" class="btn btn-primary">
    </form>

    <!-- COMMENTS -->

    <p><b>Comments</b></p>

    @foreach ($post->comments as $comment) 
        <p>{{ $comment->text }}</p>
        <p>- {{ $comment->user->name }} ({{ $comment->created_at }})</p>
    @endforeach

    <!-- LEAVING A COMMENT -->

    <p><b>Leave a comment!</b></p>
            
    <form method="POST" action="{{ route('comments.store', $post) }}">
        @csrf
        <p><textarea name="text" rows="4" cols="30">{{ old('text') }}</textarea></p>
        <input type="submit" value="SUBMIT" class="btn btn-primary">
    </form>

@endsection