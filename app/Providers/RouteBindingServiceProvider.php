<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteBindingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $binder = $this->binder;

        $binder->bind('id', function($id) {
            return true;
        });

    }
}
