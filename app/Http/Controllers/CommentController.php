<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Mail\CommentPosted;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\CommentPosted as NotificationsCommentPosted;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('posts.comment', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Post $post)
    {
        $attributes = $request->validated();
        $comment = $post->comments()->create($attributes);

        if ($post->notify === 1) {
            $post->author->notify(new NotificationsCommentPosted($post));
            // Mail::to($post->author->email)->queue(new CommentPosted($post));
        }

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        auth()->user()->can('delete', $comment);
        $post = $comment->parentPost;
        $comment->delete();

        return redirect(route('posts.show', $post->id));
    }
}
