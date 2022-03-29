<?php


namespace App\Services;


use App\Models\Post;
use App\Notifications\SendNewPostNotification;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class DispatchSubscriberEmails
{
    public function handle()
    {
        $processingPost = Post::where('notification_status', Config::get('constant.notification.processing'))->get();

        foreach($processingPost as $post) {

            if(empty($post->subscribers)) return;

            foreach($post->subscribers as $subscriber) {

                if (Cache::has("post-sent-$subscriber->id-$post->id")) {
                    //Already sent
                    return;
                }
                try {
                    $subscriber->notify(new SendNewPostNotification($post));
                    Cache::put("post-sent-{$subscriber->id}-{$post->id}", "{$subscriber->id}-{$post->id}", Carbon::now()->addDays(3) );
                }catch (Exception $exception) {
                    Log::error("ISSUE SENDING MAIL TO USER {$subscriber->id} 'ON' {$post->id}");
                }
            }

            $post->update([
                'notification_status' => Config::get('constant.notification.sent')
            ]);
        }
    }
}
