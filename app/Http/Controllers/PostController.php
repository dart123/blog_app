<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;
    public function __construct(PostService $service)
    {
        $this->postService = $service;
    }

    public function index() {
        $posts = $this->postService->getLastPosts(6);
        $active_menu_item = '';
        return view('welcome');
    }
    public function getAll() {
        $posts = $this->postService->getAllPosts(10);
    }

    public function getSingle($slug) {

    }
}
