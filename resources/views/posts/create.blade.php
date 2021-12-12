@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p><b>Title</b></p>
        <p><input type="text" name="title" value="{{ old('title') }}"></p>
        <p><b>Body</b></p>
        <p><input type="text" name="body" value="{{ old('body') }}"></p>
        <input type="submit" value="SUBMIT" class="btn btn-primary">
    </form>
@endsection