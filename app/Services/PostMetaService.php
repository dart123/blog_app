<?php

namespace App\Services;

use App\Models\PostMeta;
use Exception;
use Illuminate\Support\Facades\Log;

class PostMetaService
{
    public function increment_meta($post_id, $meta_key) {
        try {
            $post = PostMeta::where('post_id', $post_id)
                ->where('meta_key', $meta_key)
                ->firstOrFail();

            $result = $post->update(['meta_value' => ($post->meta_value + 1)]);
            return $post->meta_value;
        }
        catch (Exception $e) {
            Log::error('Exception: '.$e->getMessage());
            return false;
        }
    }
}
