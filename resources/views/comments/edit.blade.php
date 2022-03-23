@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')
    <div class="margin">
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
            <p><b>Text</b></p>
            <p><textarea name="text" rows="1" cols="135">{{ $comment->text }}</textarea></p>
            <input type="submit" value="SUBMIT" class="btn btn-primary">
            <a href="{{ route('posts.show', $comment->post_id) }}">Back</a>
        </form>
    </div>
@endsection