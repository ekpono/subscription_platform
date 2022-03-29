<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\ValidateSubscriberRequest;
use App\Models\Subscriber;
use Exception;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(ValidateSubscriberRequest $request)
    {
        Subscriber::create($request->validated());

        return ResponseHelper::goodResponse();
    }

    public function delete(Subscriber $subscriber)
    {
        try {
            $subscriber->delete();
        }catch (Exception $exception) {
            return ResponseHelper::badResponse([], $exception->getMessage());
        }

        return ResponseHelper::goodResponse();
    }
}
