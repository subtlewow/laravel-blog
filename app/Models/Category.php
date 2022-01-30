<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * NOTES:
     *
     * HasFactory -- looks for {Model}Factory, so CategoryFactory
     * ie. Instantiating HasFactory in User model will look for UserFactory
     */


    use HasFactory; // CategoryFactory

    // returns Collection instance of all Posts (only possible cuz posts table has a 'category_id' column)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
