<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class PostService
{
    public function getLastPosts($post_num = 6) {
        return Post::select('*')
            ->orderBy('id', 'DESC')
            ->limit($post_num)
            ->get();

    }

    public function getAllPosts($per_page = 10) {
        return Post::select('*')
            ->orderBy('id', 'DESC')
            ->paginate($per_page);
    }

    public function getPostBySlug($slug) {
        try {
            $post = Post::where('slug', '=', $slug)->firstOrFail();
            $post_metas = $post->metas();

            $post_metas = $post_metas->select('meta_key', 'meta_value')
                ->whereIn('meta_key', ['likes', 'views'])
                ->get();

            $likes = $post_metas
                ->first(function($item) {
                    return $item->meta_key == 'likes';
                })
                ->meta_value;

            $views = $post_metas
                ->first(function($item) {
                    return $item->meta_key == 'views';
                })
                ->meta_value;

            $comments = $post->comments()
                ->get();
            return [
                'info' => $post,
                'likes' => $likes,
                'views' => $views,
                'comments' => $comments
            ];
        }
        catch (\Exception $e) {
            Log::error('Exception: '.$e->getMessage());
            return false;
        }

    }
}
