@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        <p>Title: <input type="text" name="title" value="{{ $post->title }}"></p>
        <p>Body: <textarea name="body" rows="5" cols="40">{{ $post->body }}</textarea></p>
        <input type="submit" value="Submit" class="btn btn-primary">
        <a href="{{ route('posts.show', $post) }}">Back</a>
    </form>
</div>
@endsection