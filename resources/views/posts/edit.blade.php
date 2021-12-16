@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="margin">
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        <p><b>Title</b></p>
        <p><textarea name="title" rows="1" cols="135">{{ $post->title }}</textarea></p>
        <p><b>Body</b></p>
        <p><textarea name="body" rows="3" cols="135">{{ $post->body }}</textarea></p>
        <input type="submit" value="SUBMIT" class="btn btn-primary">
        <a href="{{ route('posts.show', $post) }}">Back</a>
    </form>
</div>
@endsection