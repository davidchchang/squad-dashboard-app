<?php

namespace App\Listeners;

use App\Events\ShowDashboardShortcut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\Notification;

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

        Notification::title('Hello from NativePHP')
            ->message('This is a detail message coming from your Laravel app.')
            ->show();
    }
}
