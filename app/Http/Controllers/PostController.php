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

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug'), 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);


        $attributes['user_id'] = auth()->id();
        $attributes['published_at'] = now('Europe/Brussels');
        $attributes['thumbnail_path'] = request()->file('thumbnail')?->store('thumbnails');
        unset($attributes['thumbnail']);

        $post = Post::create($attributes);

        return redirect('/posts/' . $post->slug)->with('success', 'Your post has been created');
    }
}
