<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // HasFactory -- looks for UserFactory
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // everything can be mass assigned
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Encrypting password before saving to database
     *
     * Mutators are used to format the attributes b4 saving into database (ie. encrypting password)
     * Called an Eloquent Mutator -- set[AttributeName]Attribute (ie. setPasswordAttribute, setEmailAttribute etc..)
     *
     * @return void
     */
    public function setPasswordAttribute($password) {
        // before, password was not encrypted -- encrypting password
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
