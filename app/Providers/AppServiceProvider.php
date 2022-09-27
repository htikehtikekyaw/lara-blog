<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

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
    public function boot()
    {
        Paginator::useBootstrap();

        // Blade::directive('myName',function($x){
        //     return "Htike Htike Kyaw === $x";
        // });

        // Blade::if('abc',function($x){
        //     return $x;
        // });

        Blade::if('admin',function(){
            return Auth::user()->role === 'admin';
        });

        Blade::if('notAuthor',function(){
            return Auth::user()->role != 'author';
        });

        Schema::defaultStringLength(191);
    }
}
