@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All posts</div>

                <div class="panel-body">
                    @foreach ($posts as $post)

                        <h2>{{ $post->title }}</h2>

                        @foreach ($post->likes as $user)
                            {{ $user->name }} likes this !<br>
                        @endforeach

                        @if ($post->isLiked)
                            <a href="{{ route('post.like', $post->id) }}">Unlike this shit</a>
                        @else
                            <a href="{{ route('post.like', $post->id) }}">Like this awesome post!</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">My likes</div>

                <div class="panel-body">
                    @foreach (Auth::user()->likedPosts as $post)

                        <h2>{{ $post->title }}</h2>

                        <a href="{{ route('post.like', $post->id) }}">Unlike this shit</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
