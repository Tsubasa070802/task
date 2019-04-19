@extends('layouts.app')

@section('content')
 <div class="container">
        <div class="col-md-12">
            @foreach($posts as $post)
                <div class="card post">
                    <div class="card-header">
                        <span>
                            {{ $post->id . " : " }}
                        </span>
                        <span class="post-name">
                            {{ $post->user->name. " : " }}
                        </span>
                        <span>
                            {{ $post->created_at->format('Y/m/d H:s:i') }}
                        </span>
                    </div>
                    <div class="card-body">
                        <div>
                            {{ $post->body }}
                        </div>
                        @if ($post->image_path)
                            <div>
                                <img src="{{ asset('storage/image/' . $post->image_path) }}" width='200px'>
                            </div>
                        @endif
                    </div>
                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        more
                    </a>
                </div>
            @endforeach
        </div>
        {{ $posts->links() }}
    <div class="container">
@endsection 