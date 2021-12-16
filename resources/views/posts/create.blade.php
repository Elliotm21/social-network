@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    <div class="margin">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <p><b>Title</b></p>
            <p><textarea name="title" rows="1" cols="135">{{ old('title') }}</textarea></p>
            <p><b>Body</b></p>
            <p><textarea name="body" rows="3" cols="135">{{ old('body') }}</textarea></p>
            <input type="submit" value="SUBMIT" class="btn btn-primary">
        </form>
    </div>
@endsection