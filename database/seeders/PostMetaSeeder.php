<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostMeta;

class PostMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Post::all() as $post) {
            PostMeta::create([
                'post_id' => $post->id,
                'meta_key' => 'likes',
                'meta_value' => rand(1, 200)
            ]);
            PostMeta::create([
                'post_id' => $post->id,
                'meta_key' => 'views',
                'meta_value' => rand(1, 200)
            ]);
        }
    }
}
