<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id','slug', 'body'];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread() 
    {
         return $this->belongsTo(Comment::class, 'comment_id');
    }


    public function vote() 
    {
        return $this->hasMany(Vote::class);
    }
}
