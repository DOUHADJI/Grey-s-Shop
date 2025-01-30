<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Config;
use Filament\Forms\Components\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('categories', Category::all());
        view()->share("configs", Config::first());
    }
}
