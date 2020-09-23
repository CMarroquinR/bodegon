<?php

namespace App\Providers;

use App\Models\Publicidad;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share('publicidad', Publicidad::where('inicio', '<=', date('Y-m-d'))->where('fin', '>=', date('Y-m-d'))->pluck('imagen'));
    }
}
