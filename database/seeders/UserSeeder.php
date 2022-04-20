<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()
            ->count(5)
            ->has(Post::factory()->count(5)
                ->for(Category::factory())
                ->hasComments(5)
            )
            ->create();
    }
}
