<?php

namespace App\Providers;

use App\messages;
use App\transaction;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $event)
    { 
         Schema::defaultStringLength(191);

        $event->listen(BuildingMenu::class, function (BuildingMenu $event) {
            // $transaction = transaction::where('status', 'Order Recieved')->count();
            $transaction = transaction::where('status', 'Order Recieved')->count();
            $unread = messages::where('isRead', false)->count();
            // $event -> menu -> add('Main navigation');
            $event->menu->add([
                'text'        => 'Order',
                'url'         => 'admin/Order',
                'icon'        => 'fas fa-fw  fa-table',
                'label'       =>  $transaction == 0 ? '' :  $transaction,
                'label_color' => 'success',
            ]);

            $event->menu->add([
                'text'        => 'Mesage',
                'url'         => 'admin/inbox',
                'icon'        => 'fa fa-fw fa-envelope',
                'label'       =>  $unread == 0 ? '' :  $unread,
                'label_color' => 'success',
            ]);
        });
    }
}
