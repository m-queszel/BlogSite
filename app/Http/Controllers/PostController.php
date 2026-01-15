<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->with('author')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(){
        return view('posts.create', []);
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required', 'max:255']
        ]);
        Auth::user()->posts()->create($attributes);
        return redirect()->route('home');
    }

    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }
    
    public function edit(Post $post){
        auth()->user()->can('update', $post);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post){
        dd($request->all());
        request()->validate([
            'title' => ['required', 'min:3', 'max:50'],
            'body' => ['required', 'max:255'],
        ]);
        $post->update([
            'title' => request('title'),
            'body' => request('body')
        ]);
        return redirect('/posts/' . $post->id);
    }
}
