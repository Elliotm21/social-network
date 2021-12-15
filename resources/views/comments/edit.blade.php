@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="margin">
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
            @csrf
            <p><b>Text</b></p>
            <p><input type="text" name="text" value="{{ $comment->text }}"></p>
            <input type="submit" value="SUBMIT" class="btn btn-primary">
            <a href="{{ route('posts.show', $comment->post_id) }}">Back</a>
        </form>
    </div>
@endsection