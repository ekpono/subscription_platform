<?php

namespace App\Console\Commands;

use App\Services\DispatchSubscriberEmails;
use Illuminate\Console\Command;

class SendEmailToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch:subscriber_emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param DispatchSubscriberEmails $dispatchSubscriberEmails
     * @return int
     */
    public function handle(DispatchSubscriberEmails $dispatchSubscriberEmails)
    {
        $dispatchSubscriberEmails->handle();
    }
}
