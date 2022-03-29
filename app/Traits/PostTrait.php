<?php


namespace App\Traits;


use Closure;
use Illuminate\Support\Str;

trait PostTrait
{
    /**
     * @return Closure
     */
    protected static function onCreated(): Closure
    {
        return function ($post) {
            $post->slug = Str::slug($post->title);
        };
    }
}