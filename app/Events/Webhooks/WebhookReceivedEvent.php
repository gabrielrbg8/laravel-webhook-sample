<?php

namespace App\Events\Webhooks;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WebhookReceivedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var array $payload */
    public $payload;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }
}
