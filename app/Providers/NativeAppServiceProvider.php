<?php

namespace App\Providers;

use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\GlobalShortcut;
use Native\Laravel\Menu\Menu;
use Native\Laravel\Facades\Notification;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Menu::new()
            ->appMenu()
            ->submenu('About', Menu::new()
                ->link('https://beyondco.de', 'Beyond Code')
                ->link('https://simonhamp.me', 'Simon Hamp')
            )
            ->submenu('View', Menu::new()
                ->toggleFullscreen()
                ->separator()
                ->link('https://laravel.com', 'Learn More', 'CmdOrCtrl+L')
                ->event(\App\Events\ShowJiraDashboardShortcut::class, 'Jira Dashboard', 'CmdOrCtrl+J')
            )
            ->register();
            
        Window::open()
            ->title('Squad Dashboard')
            ->rememberState()
            ->width(800)
            ->height(800)
            ->route('jira-dashboard');

        GlobalShortcut::key('Cmd+Ctrl+D')
            ->event(\App\Events\ShowDashboardShortcut::class)
            ->register();

        /**
            Dock::menu(
                Menu::new()
                    ->event(DockItemClicked::class, 'Settings')
                    ->submenu('Help',
                        Menu::new()
                            ->event(DockItemClicked::class, 'About')
                            ->event(DockItemClicked::class, 'Learn More…')
                    )
            );

            ContextMenu::register(
                Menu::new()
                    ->event(ContextMenuClicked::class, 'Do something')
            );

            GlobalShortcut::new()
                ->key('CmdOrCtrl+Shift+I')
                ->event(ShortcutPressed::class)
                ->register();
        */
    }
}
