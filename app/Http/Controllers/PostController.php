<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;

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
        $posts = Post::latest()->get();
        return view('posts.index', ['posts' => $posts]);
    }
}
