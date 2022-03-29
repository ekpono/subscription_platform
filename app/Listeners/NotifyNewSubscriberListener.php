<?php

namespace App\Listeners;

use App\Services\DispatchSubscriberEmails;

class NotifyNewSubscriberListener
{
    public function handle()
    {
        (new DispatchSubscriberEmails())->handle();
    }
}
