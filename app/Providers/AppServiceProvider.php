<?php

namespace App\Providers;

use App\Http\ViewComposers\Home;
use App\Http\ViewComposers\HomeIndex;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('home/*', Home::class);
        view()->composer('home/index/*', HomeIndex::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
