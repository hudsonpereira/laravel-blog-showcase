<?php

use Illuminate\Database\Seeder;
use App\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)->create();

        $posts = Post::all();

        foreach ($posts as $post) {
            for ($i=0; $i < 50; $i++) {
                $post->comments()->create([
                    'body' => factory(App\Comment::class)->make()
                ]);
            }
        }
    }
}
