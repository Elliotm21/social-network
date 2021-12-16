@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <div class="margin">

        <p><b>Profile Picture</b></p>
        <img src="{{ asset('images/'.$user->id) }}" class="iconDetails">
        <br><br>

        @if (Auth::id() == $user->id)
            <form method="GET" action="{{ route('image.upload') }}">
                @csrf
                <input type="submit" value="UPDATE" class="btn btn-primary">
            </form>
        @endif

        <hr>
        <p><b>Admin: </b>{{ $user->admin }}</p>
        <p><b>Profile views: </b>{{ $user->views }}</p>
        <p><b>Posts made: </b>{{ $user->posts->count() }}</p>
        <p><b>Comments made: </b>{{ $user->comments->count() }}</p>
        
    </div>
@endsection