<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','url', 'score'];

    protected $with = ['category', 'author', 'vote'];

    public function scopeFilter($query, array $filters)
    {
        // Search queries back end for search feature
        $query->when($filters['search'] ?? false, fn($query, $search) =>

            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%'))
        );

        $query->when($filters['vote'] ?? false, fn($query, $category) =>

        $query
            ->whereHas('vote', fn($query) =>
                $query->where('slug', $category)
            )
        );


        $query->when($filters['category'] ?? false, fn($query, $category) =>

        $query
            ->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>

        $query
            ->whereHas('author', fn($query) =>
            $query->where('username', $author)
            )
        );

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vote()
    {
        return $this->hasMany(User::class);
    }

}
