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
            
            'title' => $this->faker->sentence(),
            'sub_title' => $this->faker->sentence(),
            'description'  => $this->faker->text(),
            'image'  => $this->faker->imageUrl(),
            'user_id'  => User::factory(),
            'category_id'  => Category::factory(),
            'published'  => 1,
            'menu'  => $this->faker->numberBetween($min = 0, $max = 4)
        ];
    }
}
