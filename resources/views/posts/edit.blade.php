@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="margin">
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        <p><b>Title</b></p>
        <p><input type="text" name="title" value="{{ $post->title }}"></p>
        <p><b>Body</b></p>
        <p><input type="text" name="body" value="{{ $post->body }}"></p>
        <input type="submit" value="SUBMIT" class="btn btn-primary">
        <a href="{{ route('posts.show', $post) }}">Back</a>
    </form>
</div>
@endsection