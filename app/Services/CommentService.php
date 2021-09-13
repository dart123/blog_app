<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentService
{
    public $comment_data;
    public function __construct($comment)
    {
       $this->comment_data = $comment;
    }

    public function addComment() {
        sleep(10);
        try {
            $comment = new Comment;
            $comment->title = $this->comment_data['title'];
            $comment->content = $this->comment_data['content'];
            $comment->post_id = $this->comment_data['post_id'];
            $result = $comment->save();
            return $result;
        }
        catch(\Exception $e) {
            Log::error('Exception: '.$e->getMessage());
            return false;
        }
    }
}
