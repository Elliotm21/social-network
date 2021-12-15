@extends('layouts.app')

@section('title', $post->title)

@section('content')

<!-- POST -->

    <table class="gfg">

        <colgroup>
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 50%;">
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 10%;">
        </colgroup>

        <tbody>
            <tr>
                <td>
                    <br>
                    <form method="POST" action="{{ route('posts.like', $post) }}">
                        @csrf
                        <input type="submit" value="LIKE" class="btn btn-primary">
                    </form>
                    <div class="small-font">{{ $post->likes->count() }} likes</div>
                    <br>
                </td>
                <td>
                    <img src="{{ asset('images/'.$post->user->id) }}" class="iconDetails">
                </td>
                <td>
                    <div class="link"><a href="{{ route('users.show', $post->user) }}">{{$post->user->name}}</a></div>
                    <div class="small-font">
                        ({{ date('d/m/Y H:i', strtotime($post->created_at)) }})
                    </div>
                </td>
                <td>
                    <br>
                    <p>{{ $post->body }}</p>
                </td>
                <td>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        <a href="{{ route('posts.edit', $post) }}">EDIT</a>
                    </form>
                </td>
                <td>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">DELETE</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <br>

    <!-- COMMENTS -->

    <div class="margin">
        <p><b>Comments ({{ $post->comments->count() }})</b></p>
    </div>

    <table class="gfg">

        <colgroup>
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 50%;">
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 10%;">
        </colgroup>

        <tbody>
            @foreach ($post->comments as $comment) 
            <tr>
                <td>
                    <br>
                    <form method="POST" action="{{ route('comments.like', $comment) }}">
                        @csrf
                        <input type="submit" value="LIKE" class="btn btn-primary">
                    </form>
                    <div class="small-font">
                        {{ $comment->likes->count() }} likes
                    </div>
                    <br>
                </td>
                <td>
                    <img src="{{ asset('images/'.$comment->user->id) }}" class="iconDetails">
                </td>
                <td>
                    <div class="link"><a href="{{ route('users.show', $comment->user) }}">{{$comment->user->name}}</a></div>
                    <div class="small-font">
                        ({{ date('d/m/Y H:i', strtotime($comment->created_at)) }})</div>
                    </div>
                </td>
                <td>
                    <br>
                    <p>{{ $comment->text }}</p>
                </td>
                <td>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        <a href="{{ route('comments.edit', $comment) }}">EDIT</a>
                    </form>
                </td>
                <td>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">DELETE</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- LEAVING A COMMENT -->

    <div class="margin">

        @if ($post->comments->count() == 0)
            <p>There are no comments. Be the first to make one!</p>
        @endif

        @if ($post->comments->count() > 0)
            <p><b>Leave a comment!</b></p>
        @endif
        
        <form method="POST" action="{{ route('comments.store', $post) }}">
            @csrf
            <p><textarea name="text" rows="3" cols="135">{{ old('text') }}</textarea></p>
            <input type="submit" value="SUBMIT" class="btn btn-primary">
        </form>

        <br>

    </div>

@endsection