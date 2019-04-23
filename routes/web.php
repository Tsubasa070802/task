<?php

Route::get('/', function () {
    return redirect('posts');
});

Auth::routes();

Route::resource('posts', 'PostController', ['except' => []])->middleware('auth');
Route::resource('comments', 'CommentsController', ['except' => []])->middleware('auth');
