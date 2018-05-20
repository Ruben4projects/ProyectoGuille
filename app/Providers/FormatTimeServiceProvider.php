<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Commentrutina;
use App\Commentdieta;
use App\Commentnutricion;
use Illuminate\Support\Facades\View;

class FormatTimeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/FormatTime.php';
    }
}
