<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    // HasFactory -- looks for CategoryFactory
    use HasFactory;
    
    // returns all posts 
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
