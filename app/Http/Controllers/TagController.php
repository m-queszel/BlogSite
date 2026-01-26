<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Category;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $posts = $tag->posts()->with('author');
        if(request('category')){
            $posts->where('category_id', request('category'));
        }

        return view('results', [
            'posts' => $posts->paginate(10),
            'categories' => Category::all()
        ]);
    }
}
