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

    <hr>

    <!-- COMMENTS -->

    <p><b>Comments ({{ $post->comments->count() }})</b></p>
    @foreach ($post->comments as $comment) 
        <div class="comment">
        <hr>
        <img src="{{ asset('images/'.$post->user->id) }}" class="iconDetails">
        <p><a href="{{ route('users.show', $comment->user) }}" style="display: inline">
            {{$comment->user->name}}</a> ({{ date('d/m/Y H:i', strtotime($comment->created_at)) }})</p>
        <p>{{ $comment-> text }}</p>
        <hr>
        <p>
    </div>
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