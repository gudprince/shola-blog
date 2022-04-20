<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [   
            'content'  => $this->faker->text(),
            'guest_full_name'  => $this->faker->name(),
            'guest_email'  => $this->faker->safeEmail(),
            'post_id' => $this->faker->randomDigit(),
        ];
    }
}
