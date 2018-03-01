<?php

namespace App\Providers;

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
        //
        view()->composer('layouts.right',function($view){
            $view->with('archives', \App\Article::archives());
            $view->with('tags', \App\Tag::allTags());
            $view->with('subjects', \App\Subject::allSubject());
        });

        view()->composer('layouts.nav',function($view){
            $view->with('categories',\App\Category::getCategories());
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
