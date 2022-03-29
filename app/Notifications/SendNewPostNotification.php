<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class SendNewPostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private Post $post;

    /**
     * Create a new notification instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Thank you for subscribing to our newsletter')
                    ->action('Read more', url('/'))
                    ->line('Thank you for using our application!')
                    ->line( new HtmlString($this->post->description) )
                    ->subject('NEWSLETTER: ' . $this->post->title);
    }
}
