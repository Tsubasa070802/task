<?php

Route::get('/', function () {
    return redirect('posts');
});

Auth::routes();

Route::resource('posts', 'PostController', ['except' => ['show', 'edit', 'update', 'destroy']])->middleware('auth');