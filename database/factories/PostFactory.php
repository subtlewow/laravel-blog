<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Laravel automatically creates a user, grabs the id and assigns it to 'user_id'
            // When a Post is created, a User is also created
            'user_id' => User::factory(),
            'category_id'=> Category::factory(),
            'title'=>$this->faker->sentence(),
            'slug'=>$this->faker->slug(),
            'excerpt'=>'<p>'.implode('</p><p>', $this->faker->paragraphs(2)).'</p>',
            'body'=>'<p>'.implode('</p><p>', $this->faker->paragraphs(6)).'</p>',
        ];
    }
}
