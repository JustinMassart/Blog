<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        $filters = request()->only('search', 'category', 'author');

        return view('posts.index', [
            'posts' => Post::filter($filters)
                ->latest('published_at')
                ->with('category', 'author')
                ->paginate(9)
                ->withQueryString(),
            'page_title' => 'Tous les posts',
        ]);
    }

    public function show(Post $post)
    {
        $post->load('category', 'author');

        $page_title = "Le post : {$post->title}";

        return view('posts.show', compact('post', 'page_title'));
    }
}
