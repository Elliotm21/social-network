@extends('layouts.app')

@section('title', 'Home')

@section('content')

<table class="table1">

    <colgroup>
        <col span="1" style="width: 10%;">
        <col span="1" style="width: 15%;">
        <col span="1" style="width: 50%;">
        <col span="1" style="width: 10%;">
        <col span="1" style="width: 5%;">
        <col span="1" style="width: 10%;">
    </colgroup>

        @if(!empty($posts) && $posts->count())
            @foreach($posts as $key => $value)
                <tr>
                    <td>
                        <br>
                        <img src="{{ asset('images/'.$value->user->profilePicture->path) }}"
                            class="iconDetails" alt="profile picture">
                        <br><br>
                    </td>
                    <td>
                        <div class="link"><a href="{{ route('users.show', $value->user) }}">
                            {{$value->user->name}}</a></div>
                        <div class="small-font">
                            ({{ date('d/m/Y H:i', strtotime($value->created_at)) }})
                        </div>
                    </td>
                    <td>
                        <br>
                        <p><a href="{{ route('posts.show', $value) }}">{{$value->title}}</a></b></p>
                    </td>
                    <td>
                        <br>
                        <div class="small-font">
                            <p>{{ $value->views }} views</p>
                        </div>
                    </td>
                    <td>
                        <br>
                        <div class="small-font">
                            <p>{{ $value->likes->count() }} likes</p>
                        </div>
                    </td>
                    <td>
                        <br>
                        <div class="small-font">
                            <p>{{ $value->comments->count() }} comments</p>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no posts. Be the first to make one!</td>
            </tr>
        @endif
    </tbody>
</table>

<br>


<div class="margin">
    {!! $posts->links() !!}
</div>

<br>

@endsection