<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getLastPosts($post_num = 6) {
        return Post::select('*')
            ->orderBy('created_at', 'DESC')
            ->limit($post_num)
            ->get();

    }

    public function getAllPosts($per_page = 10) {
        return Post::select('*')
            ->orderBy('created_at', 'DESC')
            ->paginate($per_page);
    }

    public function getPostBySlug($slug) {

    }
}
