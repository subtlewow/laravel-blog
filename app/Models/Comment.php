<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Looks for {Model}Factory, so looks for CommentFactory
    use HasFactory;

    // a comment belongsto a post
    // assumes a foreign key of 'post_id'
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // when function name not the same as that of the class, need to pass in the foreign key
    // assumes a foreign key of 'author_id' however that column doesnt exist and it isn't want we want
    //  -> need to pass in a new foreign key that will be the column name we want, which is 'user_id'
    // only need to pass in the foreign key when our function name is different than that of our model name
    // ie. author() w/ User::class means we need to define a foreign key
    //      while post() w/ Post::class means we do not, 'post_id' will be assumed
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
