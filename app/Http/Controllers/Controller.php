<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\RedditPost;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showPosts()
    {
        $limit = 10;
        $subReddit = 'all';
        $posts = RedditPost::getPosts($subReddit, $limit);

        return view('trending.show', compact('posts'));
    }

}
