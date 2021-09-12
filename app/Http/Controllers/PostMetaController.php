<?php

namespace App\Http\Controllers;

use App\Services\PostMetaService;
use Illuminate\Http\Request;

class PostMetaController extends Controller
{
    private $postMetaService;
    public function __construct(PostMetaService $service)
    {
        $this->postMetaService = $service;
    }
    public function addLike(Request $request) {
        $post_id = $request->get('post_id');
        $result = $this->postMetaService->increment_meta($post_id, 'likes');
        if ($result)
            return json_encode($result);
        else
            return json_encode(['error' => 'Some error happened']);

    }
    public function addView(Request $request) {
        $post_id = $request->get('post_id');
        $result = $this->postMetaService->increment_meta($post_id, 'views');
        if ($result)
            return json_encode($result);
        else
            return json_encode(['error' => 'Some error happened']);
    }
}
