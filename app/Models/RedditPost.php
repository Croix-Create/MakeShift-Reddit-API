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
        'body',
    ];

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value); // Capitalize the first letter of the title
    }

    public function getAuthorAttribute($value)
    {
        return e($value); // Escape HTML to prevent XSS vulnerabilities
    }

    public function getScoreAttribute($value)
    {
        return number_format($value); // Format the score as a comma-separated number (optional)
    }

    public function getUrlAttribute($value)
    {
        return $value; // No change needed for URL
    }

    public function getBodyAttribute($value)
    {
        // You can optionally process the body content here (e.g., truncate or convert Markdown)
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
            // Handle unsuccessful response (e.g., log error or throw exception)
            return [];
        }
    }

}