<?php

namespace edgewizz\mcqpa2;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class Mcqpa2ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Edgewizz\Mcqpa2\Controllers\Mcqpa2Controller');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd($this);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__ . '/components', 'mcqpa2');
        Blade::component('mcqpa2::mcqpa2.open', 'mcqpa2.open');
        Blade::component('mcqpa2::mcqpa2.index', 'mcqpa2.index');
        Blade::component('mcqpa2::mcqpa2.edit', 'mcqpa2.edit');
    }
}
