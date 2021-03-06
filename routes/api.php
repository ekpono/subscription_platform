<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
   return response()->json(['message' => 'Api works']);
});

Route::group(['prefix' => 'posts'], function() {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{post}', [PostController::class, 'show']);
    Route::post('/', [PostController::class, 'store']);
    Route::delete('/{post}', [PostController::class, 'delete']);
});

Route::group(['prefix' => 'subscribe'], function() {
    Route::post('/', [SubscriberController::class, 'store']);
    Route::delete('/{subscriber}', [SubscriberController::class, 'delete']);
});

Route::group(['prefix' => 'website'], function() {
   Route::get('/', [WebsiteController::class, 'index']);
});
