<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Post;
use App\Models\Comment;
use Illuminate\Routing\Controller as BaseController;

class CommentController extends BaseController
{
    public function store(Post $post)
    {
        request()->validate([
           'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }

    public function thread(Comment $comment)
    {
        request()->validate([
            'body' => 'required'
         ]);
 
         $comment->thread()->create([
             'user_id' => request()->user()->id,
             'body' => request('body')
         ]);
 
         return back();
    }
}
