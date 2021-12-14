@extends('layouts.app')

@section('title', 'Home')

@section('content')

<table class="gfg">
        @if(!empty($posts) && $posts->count())
            @foreach($posts as $key => $value)
                <tr>
                    <td>
                        <img src="{{ asset('images/'.$value->user->id) }}" class="iconDetails">
                        <p><a href="{{ route('users.show', $value->user) }}" style="display: inline">
                                {{$value->user->name}}</a></p>
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
<div class="center">
    {!! $posts->links() !!}
</div>

@endsection