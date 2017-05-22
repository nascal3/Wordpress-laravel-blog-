<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\category;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view){
            $categories = category::with(['posts' => function($query){
                $query->published();
            }])->orderBy('title', 'asc')->get();
            return $view->with('categories', $categories);
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
