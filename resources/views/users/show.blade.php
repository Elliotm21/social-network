@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <div class="margin">

        <p><b>Profile Picture</b></p>

        <img src="{{ asset('images/'.$user->profilePicture->path) }}"
            class="iconDetails" alt="profile picture">
        
        <br><br>

        @if (Auth::id() == $user->id)
            <form method="GET" action="{{ route('image.upload') }}">
                @csrf
                <input type="submit" value="UPDATE" class="btn btn-primary">
            </form>
        @endif

        <hr>

        @if ($user->admin == 1)
            <p><b>Admin account</b></p>
        @endif

        <p>{{ $user->views }} views</p>
        <p>{{ $user->posts->count() }} posts made</p>
        <p>{{ $user->comments->count() }} comments made</p>

    </div>
@endsection