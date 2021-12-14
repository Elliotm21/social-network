@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <!-- POST -->
    
    <img src="{{ asset('images/'.$post->user->id) }}" class="iconDetails">
    <p><a href="{{ route('users.show', $post->user) }}" style="display: inline">
        {{$post->user->name}}</a> ({{ date('d/m/Y H:i', strtotime($post->created_at)) }})</p>
    <p>{{ $post-> body }}</p>

    <br>

    <div class="btn-group">
        <input type="submit" value="EDIT">
        <input type="submit" value="DELETE">
    </div>

    <br>
    <br>

    <form method="POST" action="{{ route('posts.like', $post) }}">
        @csrf
        <input type="submit" value="LIKE" class="btn btn-primary">
    </form>

    <hr>

    <p>Likes ({{ $post->likes->count() }})</p>

    <hr>

    <!-- COMMENTS -->

    <p><b>Comments ({{ $post->comments->count() }})</b></p>
    @foreach ($post->comments as $comment) 
        <div class="comment">
        <hr>
        <p>Likes ({{ $comment->likes->count() }})</p>
        <img src="{{ asset('images/'.$post->user->id) }}" class="iconDetails">
        <p><a href="{{ route('users.show', $comment->user) }}" style="display: inline">
            {{$comment->user->name}}</a> ({{ date('d/m/Y H:i', strtotime($comment->created_at)) }})</p>
        <p>{{ $comment-> text }}</p>
        <hr>
        <p>
    </div>
    <form method="POST" action="{{ route('comments.like', $post, $comment) }}">
        @csrf
        <input type="submit" value="LIKE COMMENT" class="btn btn-primary">
    </form>

    @endforeach

    @if ($post->comments->count() == 0)
        <p>There are no comments. Be the first to make one!</p>
    @endif

    <!-- LEAVING A COMMENT -->

    @if ($post->comments->count() > 0)
        <p><b>Leave a comment!</b></p>
    @endif
    
    <form method="POST" action="{{ route('comments.store', $post) }}">
        @csrf
        <p><textarea name="text" rows="4" cols="30">{{ old('text') }}</textarea></p>
        <input type="submit" value="SUBMIT" class="btn btn-primary">
        <hr>
    </form>

@endsection