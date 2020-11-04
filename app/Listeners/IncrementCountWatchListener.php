<?php

namespace App\Listeners;

use App\Events\IncrementCountWatchEvent;
use App\Jobs\IncrementCountWatch;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Log;


class IncrementCountWatchListener
{
    use DispatchesJobs;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(IncrementCountWatchEvent $event)
    {
        if ($event) {
            $this->dispatch(new IncrementCountWatch($event->article_id));
        } else {
            Log::error('article not found', [$event->article_id]);
        }
    }
}
