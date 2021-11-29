<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController
{

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(150)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = $this->validatePost();

        $attributes['user_id'] = auth()->id();
        $attributes['published_at'] = now('Europe/Brussels');
        $attributes['thumbnail_path'] = request()->file('thumbnail')?->store('thumbnails');
        unset($attributes['thumbnail']);

        $post = Post::create($attributes);

        return redirect('/posts/' . $post->slug)->with('success', 'Your post has been created');
    }

    public function edit(Post $post)
    {

        return view('admin.posts.edit', [
            'post' => $post,
        ]);

    }

    public function update(Post $post)
    {

        $attributes = $this->validatePost();

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail_path'] = request()->file('thumbnail')?->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'The post has been updated successfully !');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'The post has been deleted successfully !');
    }

    /**
     * @param Post $post
     * @return array
     */
    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post), 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }

}
