<?php

namespace App\Models;

use App\Models\Post;
use GuzzleHttp\Client; 

use Illuminate\Database\Eloquent\Model;

class RedditPost extends Model
{
    protected $fillable = [
        'title',
        'author',
        'score',
        'url',
    ];

    protected $client;

    public function __construct(Client $client, string $defaultBody = '')
    {
        $this->client = $client;
        $this->defaultBody = $defaultBody;
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getAuthorAttribute($value)
    {
        return e($value);
    }

    public function getScoreAttribute($value)
    {
        return number_format($value);
    }

    public function getUrlAttribute($value)
    {
        return $value;
    }

    public function getBodyAttribute($value)
    {
        return $value;
    }

    public static function getPosts(string $subreddit = 'all', int $limit = 10): array
    {
        $client = new Client();

        $url = "https://www.reddit.com/r/$subreddit/.json?limit=$limit";

        $response = $client->get($url);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);
            $redditPosts = [];

            foreach ($data['data']['children'] as $child) {
                $redditPost = new Post([
                    'title' => $child['data']['title'],
                    'author' => $child['data']['author'],
                    'score' => $child['data']['score'],
                    'url' => $child['data']['url'],
                ]);

                $redditPosts[] = $redditPost;
            }

            return $redditPosts;
        } else {
            
            return [];
        }
    }

}