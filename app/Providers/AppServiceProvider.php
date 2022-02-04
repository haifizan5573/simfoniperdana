<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MenuGroup;
use App\Models\Menu;
use Illuminate\Support\Facades\View;

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
      
        View::composer('*', function ($view) {
            $view->with('menugroup', MenuGroup::orderby('order','asc')->get());
            $view->with('menus', Menu::all());
            $view->with('curMonth', date('F'));
            $view->with('curYear', date('Y'));
        });
    }
}
