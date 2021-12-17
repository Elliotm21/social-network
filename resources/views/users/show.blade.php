@extends('layouts.app')

@section('title', $user->name)

@section('content')

<table class="table2">

    <colgroup>
        <col span="1" style="width: 10%;">
        <col span="1" style="width: 20%;">
        <col span="1" style="width: 10%;">
    </colgroup>

    <tbody>
        <tr>
            <td>
                <br>
                <img src="{{ asset('images/'.$user->profilePicture->path) }}"
                    class="iconDetails2" alt="profile picture">
                @if (Auth::id() == $user->id)
                    <br><br>
                    <form method="GET" action="{{ route('image.upload') }}">
                        @csrf
                        <input type="submit" value="UPDATE" class="btn btn-primary">
                    </form>
                    <br>
                @else
                    <br><br>
                @endif
            </td>
            <td>
            </td>
            <td>
                <div class="small-font">
                    <br>
                    <p>{{ $user->views }} profile views</p>
                    <p>{{ $user->posts->count() }} posts made</p>
                    <p>{{ $user->comments->count() }} comments left</p>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<div class="margin">
    @if ($user->admin == 1)
        <p>{{ $user->name }} has an admin account.</p>
    @else
        <p>{{ $user->name }} does not have an admin account.</p>
    @endif
</div>

@endsection