<?php

namespace App\Providers;

use App\Models\Commercial;
use Illuminate\Support\Facades\Cache;
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
        view()->share('commercial_list', value: Cache::rememberForever('commercial_list', function () {
            return Commercial::all();
        }));
    }
}
