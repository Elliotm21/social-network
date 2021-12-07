@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>
        <p>Body: <input type="text" name="body" value="{{ old('body') }}"></p>
        <button type="submit" value="SUBMIT">SUBMIT</button>
    </form>
@endsection