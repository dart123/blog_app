<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Jobs\AddComment;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentService;
//    public function __construct(CommentService $service)
//    {
//        $this->commentService = $service;
//    }
    public function store(StoreCommentRequest $request) {
        $validated = $request->validated();

        $this->commentService = new CommentService($validated);

        AddComment::dispatch($this->commentService);
        return 1;

//        $result = $this->commentService->addComment($validated);
//        if ($result)
//            return 1;
//        else
//            return json_encode(['error' => 'Something went wrong']);
    }
}
