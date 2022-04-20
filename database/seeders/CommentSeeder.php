<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::factory()->create();
 
        $comment = Comment::factory()
            ->count(3)
            ->for($post)
            ->create();
    }
}
