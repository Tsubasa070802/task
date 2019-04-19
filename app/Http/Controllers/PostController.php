<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;

use App\Http\Requests\StorePost;

class PostController extends Controller
{
    
    public function create()
    {
         return view('posts.create', ['user' => Auth::user()]);
    }

   
    public function store(Request $request)
    {
        $post = new Post;
        
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $post->image_path = basename($path);
        } else {
            $post->image_path = null;
            
        }
        
        unset($form['_token']);
        unset($form['image']);
        $post->fill($form)->save();
        
        return redirect('posts');
    }
    
     public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }
    
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        
        return view('posts.show',[
            'post'=> $post,    
        ]);
    }
    
    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        
         return view('posts.edit', [
        'post' => $post,
    ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);
    
        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();
    
        return redirect()->route('posts.show', ['post' => $post]);}
 }
