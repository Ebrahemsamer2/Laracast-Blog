<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'author']; // or use with in the query builder
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // alternative solution for bind slug instead of id in route
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when( $filters['search'] ?? false, fn($query, $search) => 
            $query->where( fn($query) =>
                $query->where('title', 'like' , '%' . $search .'%')
                ->orWhere('content', 'like' , '%' . $search .'%')
            )  
        );

        // $query->when( $filters['category'] ?? false, fn($query, $category) =>
            
        //     $query->whereExists(fn($query) =>
        //         $query
        //             ->from('categories')
        //             ->whereColumn('categories.id','posts.category_id')
        //             ->where('categories.slug', $category)
        //     )
        // );

        $query->when( $filters['category'] ?? false, fn($query, $category) => 
            $query->whereHas('category', fn($query) => 
                $query->where('slug', $category)
            )
        );

        $query->when( $filters['author'] ?? false, fn($query, $author) => 
            $query->whereHas('author', fn($query) => 
                $query->where('username', $author)
            )
        );

    }
}
