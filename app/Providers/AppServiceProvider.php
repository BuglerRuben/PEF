<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;


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
        $this->app->singleton(Admin::class);
        $this->app->singleton(AdminController::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    Blade::if ('admin', function () {
        return auth()->check() && auth()->user()->admin;
    });
    Route::resourceVerbs([
        'create' => 'creer',
        'edit' => 'modifier',
    ]);
        //
    }
}
