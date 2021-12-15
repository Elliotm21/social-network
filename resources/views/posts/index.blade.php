@extends('layouts.app')

@section('title', 'Home')

@section('content')

<table class="gfg">

    <colgroup>
        <col span="1" style="width: 10%;">
        <col span="1" style="width: 10%;">
        <col span="1" style="width: 60%;">
        <col span="1" style="width: 20%;">
    </colgroup>

        @if(!empty($posts) && $posts->count())
            @foreach($posts as $key => $value)
                <tr>
                    <td> <!-- Row 1 -->
                        <img src="{{ asset('images/'.$value->user->id) }}" class="iconDetails">
                    </td>
                    <td> <!-- Row 2 -->
                        <p><a href="{{ route('users.show', $value->user) }}" style="display: inline">
                            {{$value->user->name}}</a></p>
                        <div class="small-font">
                            ({{ date('d/m/Y H:i', strtotime($value->created_at)) }})
                        </div>
                    </td>
                    <td> <!-- Row 3 -->
                        <br>
                        <p><a href="{{ route('posts.show', $value) }}">{{$value->title}}</a></b></p>
                    </td>
                    <td> <!-- Row 4 -->
                        <br>
                        <div class="small-font">
                            <p>{{ $value->likes->count() }} likes</p>
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