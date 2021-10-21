<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {

        $attributes = request()->validate([
            'body' => ['required'],
        ]);

        $attributes['user_id'] = auth()->id();

        $post->comments()->create($attributes);

        return back()->with('success', 'Your comment has been uploaded !');

    }
}
