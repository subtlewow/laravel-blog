<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    // All parameters can be mass-assigned, aside from the ones specified
    // To turn off mass-assignment, set $guarded to empty array
    protected $guarded = ['id'];

    // These parameters can be mass-assigned
    protected $fillable = [
        'title',
        'excerpt',
        'body'
    ];
}
