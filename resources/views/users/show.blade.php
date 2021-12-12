@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <img src="{{ asset('images/'.$user->id) }}" class="iconDetails">
    <p><b>Admin: </b>X</p>
    <p><b>Profile views: </b>X</p>
    <p><b>Posts made: </b>X</p>
    <p><b>Comments made: </b>X</p>
@endsection