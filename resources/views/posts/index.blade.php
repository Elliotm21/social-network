@extends('layouts.app')

@section('title', 'Home')

@section('content')

<table class="table table-bordered">
        @if(!empty($posts) && $posts->count())
            @foreach($posts as $key => $value)
                <tr>
                <div>
                <img src="{{ asset('images/'.$value->user->id) }}" class="iconDetails">
                </div>  
                <div style='margin-left:20px;'>
                    <p><a href="{{ route('users.show', $value->user) }}" style="display: inline">
                        {{$value->user->name}}</a> ({{ date('d/m/Y H:i', strtotime($value->created_at)) }})</p>

                    <p><a href="{{ route('posts.show', $value) }}">{{$value->title}}</a></b></p>
                <hr>
                </div>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no posts. Be the first to make one!</td>
            </tr>
        @endif
    </tbody>
</table>

<div class="center">
    {!! $posts->links() !!}
</div>

@endsection