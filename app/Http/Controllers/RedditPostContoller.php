<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\RedditPost;
use App\Models\Post;
use Illuminate\View\View;



class RedditPostController extends BaseController
{


    public function index() 
    {
        return view("trending.show");
    }

    public function getPosts(): View
    {
        $limit = 10;
        $subReddit = 'all';
        $posts = RedditPost::getPosts($subReddit, $limit);

    return view('trending.show', compact('posts'));
    }

    public function showRedditPosts(Post $redditPost) 
    {
        return view('trending.show', [
            'redditPost' => $redditPost
        ]);
    }
}
