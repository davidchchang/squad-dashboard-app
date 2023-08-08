<?php

namespace App\Listeners;

use App\Events\ShowJiraDashboardShortcut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Native\Laravel\Facades\Notification;
use Native\Laravel\Facades\Window;

class NavigateToJiraDashboard
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
    public function handle(ShowJiraDashboardShortcut $event): void
    {
        //
        Notification::title('Squad Dashboard')
            ->message('Navigating to Jira Dashboard')
            ->show();

        Window::open('dashboard')
            ->width(800)
            ->height(800)
            ->route('jira-dashboard');
    }
}
