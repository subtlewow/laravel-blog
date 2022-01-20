<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        // only need if we need to refresh database multiple times throughout development
        User::truncate();
        Post::truncate();
        Category::truncate();

        // $user = User::factory()->create([
        //     'name' => 'John Doe'
        // ]);

        // Post::factory(5)->create([
        //     'user_id' => $user->id
        // ]);

        Post::factory(12)->create();

        // Post::factory(10)->create(); // creates user, category and post 

        // $user = User::factory()->create();


        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title'=>'My Family Post',
        //     'slug'=>'my-family-post',
        //     'excerpt'=>'Lorem ipsum dolor sit amet.',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Felis donec et odio pellentesque diam volutpat commodo sed.</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title'=>'My Work Post',
        //     'slug'=>'my-work-post',
        //     'excerpt'=>'Lorem ipsum dolor sit amet.',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Felis donec et odio pellentesque diam volutpat commodo sed.</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title'=>'My Personal Post',
        //     'slug'=>'my-personal-post',
        //     'excerpt'=>'Lorem ipsum dolor sit amet.',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Felis donec et odio pellentesque diam volutpat commodo sed.</p>'
        // ]);
    }
}
