<?php

namespace Garudatekno\TailwindComponents;

use Illuminate\Support\ServiceProvider;

class TailwindComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'components');

        $this->publishes([
            __DIR__.'/../resources/views/components' => resource_path('views/components'),
        ]);
    }
}
