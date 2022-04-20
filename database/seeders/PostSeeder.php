<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = User::factory()->create();
 
        $posts = Post::factory()
            ->count(3)
            ->for($user)
            ->hasComments(3,function (array $attributes, Post $post) {
                return ['post_id' => $post->id];
            })
            ->create();
    }
}
