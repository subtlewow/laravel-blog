<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Any new eloquent model will have access to a method named factory (looks for PostFactory)
    // If PostFactory.php does not exist, an error will be thrown
    use HasFactory; // Post::factory()
    
    // All parameters can be mass-assigned, aside from the ones specified
    // To turn off mass-assignment, set $guarded to empty array
    protected $guarded = [];

    // A post belongs to a category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
