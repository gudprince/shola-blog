<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Category::factory()->count(4)
            ->has(Post::factory()->count(20)
                    ->for(User::factory())
                    ->hasComments(5)
                )
            ->create();
    }
}
