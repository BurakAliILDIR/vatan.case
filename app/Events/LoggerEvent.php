<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoggerEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $ip, $type;

    public function __construct( string $ip, string $type )
    {
        $this->ip = $ip;
        $this->type = $type;
    }

}
