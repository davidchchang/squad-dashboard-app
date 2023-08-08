<?php

namespace App\Listeners;

use App\Events\ShowDashboardShortcut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Native\Laravel\Facades\Window;

class BringAppToForeground
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ShowDashboardShortcut $event): void
    {
        Window::open();
    }
}
