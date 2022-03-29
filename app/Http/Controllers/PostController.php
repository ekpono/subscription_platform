<?php

namespace App\Http\Controllers;

use App\Events\NotifyNewSubscriberEvent;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ValidatePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return ResponseHelper::goodResponse(Post::all());
    }

    public function store(ValidatePostRequest $request)
    {
        $post = Post::create($request->validated());

        NotifyNewSubscriberEvent::dispatch();

        return ResponseHelper::goodResponse($post);
    }

    public function show(Post $post)
    {
        try {
            return ResponseHelper::goodResponse($post);
        }catch (Exception $exception) {
            return ResponseHelper::badResponse();
        }
    }

    public function delete(Post $post)
    {
        $post->delete();

        return ResponseHelper::goodResponse([]);
    }
}
