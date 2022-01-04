<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    // All parameters can be mass-assigned, aside from the ones specified
    // To turn off mass-assignment, set $guarded to empty array
    protected $guarded = [];

    // A post belongs to a category
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}
