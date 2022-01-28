<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Any new eloquent model will have access to a method named factory (looks for PostFactory)
    // If PostFactory.php does not exist, an error will be thrown
    use HasFactory; // Post::factory() (looks for PostFactory)

    // All parameters can be mass-assigned, aside from the ones specified
    // To turn off mass-assignment, set $guarded to empty array
    protected $guarded = [];

    protected $with = ['category', 'author']; // eager-loading these parameters

    /**
     * scopeFilter
     *
     * Scopes the query for filter()
     *
     * @return void
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query
                ->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query
                ->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    // A post belongs to a category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() { // user() suggests that the foreign key is user_id and author() assumes a foreign key of author_id
        return $this->belongsTo(User::class, 'user_id');
    }

}
