@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <p><b>Profile Picture</b></p>
    <img src="{{ asset('images/'.$user->id) }}" class="iconDetails">

@if (Auth::id() == $user->id)

    <br><br><br>
    <form method="GET" action="{{ route('image.upload') }}">
        @csrf
        <input type="submit" value="UPDATE" class="btn btn-primary">
    </form>

@endif

    <hr>
    <p><b>Admin: </b>{{ $user->admin }}</p>
    <p><b>Profile views: </b>X</p>
    <p><b>Posts made: </b>X</p>
    <p><b>Comments made: </b>X</p>
@endsection