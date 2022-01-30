<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // HasFactory -- looks for {Model}Factory, so CategoryFactory
    // ie. Instantiating HasFactory in User model will look for UserFactory
    use HasFactory;

    // a category hasmany posts
    public function posts() {
        return $this->hasMany(Post::class);
    }

    // a category hasmany comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
