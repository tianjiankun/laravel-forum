<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
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
        view()->composer('home/*', function($view) {
            $category = Category::select('id', 'name')
                ->get();
            $assign = [
                'category' => $category
            ];
            $view->with($assign);
        });
        view()->composer('personal/*', function($view) {
//            $user = User::where
        });
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
