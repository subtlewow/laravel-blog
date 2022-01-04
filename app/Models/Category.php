<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    // A category has many posts, so use hasMany
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
