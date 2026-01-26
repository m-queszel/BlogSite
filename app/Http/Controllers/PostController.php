<?php

namespace App\Http\Controllers;

use App\Mail\CommentPosted;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('author');

        if(request('category')){
            $posts = Post::latest()->with('author')->where('category_id', request('category'));
        }

        return view('posts.index',[
            'posts' => $posts->paginate(15),
            'categories' => Category::all()
        ]);

    }

    public function create()
    {
        return view('posts.create', ['categories' => Category::all(), 'tags' => Tag::all()]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required', 'max:255'],
            'notify' => ['required', 'boolean'],
            'category_id' => ['required'],
        ]);

        $tags = request()->tag_id;
        $post = Auth::user()->posts()->create($attributes);
        foreach($tags as $tag){
            $post->tags()->attach($tag);
        }

        // Mail::to(Auth::user())->send(new CommentPosted($post));
        return redirect()->route('home');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post, 'comment' => Comment::class]);
    }

    public function edit(Post $post)
    {
        auth()->user()->can('update', $post);

        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:50'],
            'body' => ['required', 'max:255'],
            'notify' => ['required', 'boolean'],
            'category_id' => ['required'],
            'tag_id' => ['sometimes', 'array']
        ]);

        $post->update([
            'title' => request('title'),
            'body' => request('body'),
            'notify' => request('notify'),
            'category_id' => request('category_id')
        ]);

        if(isset($attributes['tag_id'])){
            $post->tags()->sync($attributes['tag_id']);
        }

        return redirect('/posts/'.$post->id);
    }

    public function destroy(Post $post)
    {
        auth()->user()->can('delete', $post);
        $post->delete();

        return redirect(route('home'));
    }
}
