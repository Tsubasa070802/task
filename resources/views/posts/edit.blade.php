@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 md-4">
                投稿の編集
            </h1>
            
            <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
                @csrf
                @method('PUT')
                
                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>

                        <textarea
                            id="body"
                             name="body"
                            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('body') ?: $post->body }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('posts.show', ['post' => $post]) }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">
                            更新する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection