<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    private $postService;
    public function __construct(PostService $service)
    {
        $this->postService = $service;
    }

    public function index() {
        $posts = $this->postService->getLastPosts(6);
        $active_menu_item = 'main';
        return view('main',
            [
                'posts' => $posts,
                'active_menu_item' => $active_menu_item
            ]
        );
    }
    public function getAll() {
        $posts = $this->postService->getAllPosts(10);
        $active_menu_item = 'catalog';
        return view('post_list',
            [
                'posts' => $posts,
                'active_menu_item' => $active_menu_item
            ]
        );
    }

    public function getSingle($slug) {
        $post = $this->postService->getPostBySlug($slug);
        if (!$post)
        {
            App::abort(404);
        }

        $active_menu_item = 'catalog';
        //return '<pre>'.print_r($post,true).'</pre>';
        return view('post_single',
            [
                'post' => $post,
                'active_menu_item' => $active_menu_item
            ]
        );
    }
}
