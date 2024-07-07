<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller as BaseController;


class PostController extends BaseController
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'vote', 'author']) // addded vote into query // check supported model dependencies
            )->paginate(6)->withQueryString()

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create() 
    {
        return view('posts.create');
    }

    public function store(Post $post)
    {
        $post = new Post();

        $attributes = $this->validatePosts($post);

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePosts($post);

        $post->update($attributes);


        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    /**
     * @param Post $post
     * @return array
     */
    protected function validatePosts(?Post $post = null): array
    {
        $post ??= new Post();
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'body' => 'required',
        ]);
        return $attributes;
    }

}
