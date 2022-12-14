<?php

namespace App\Listeners;

use App\Events\LoggerEvent;
use App\Models\Log;

class LoggerListener
{

    public function handle( LoggerEvent $event )
    {
        // TODO : Log kaydını DB ye işler.
        Log::query()->create([
            Log::IP   => $event->ip,
            Log::TYPE => $event->type,
        ]);
    }
}
