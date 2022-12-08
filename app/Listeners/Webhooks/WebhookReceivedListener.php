<?php

namespace App\Listeners\Webhooks;

use App\Events\Webhooks\WebhookReceivedEvent;
use App\Models\ActivityLog\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WebhookReceivedListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\Webhooks\WebhookReceivedEvent  $event
     * @return void
     */
    public function handle(WebhookReceivedEvent $event)
    {
        activity('webhook')
            ->causedBy($event->payload['webhook'])
            ->performedOn($event->payload['webhook'])
            ->event($event->payload['event'])
            ->withProperties($event->payload)
            ->log('webhook received');
    }

    /**
     * Determines if event will queued
     *
     * @param WebhookReceivedEvent $event
     * @return boolean
     */
    public function shouldQueue(WebhookReceivedEvent $event): bool
    {
        return true;
    }
}
