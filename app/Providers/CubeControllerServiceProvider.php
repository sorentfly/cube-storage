<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\CubeController;
use App\Services\CubeService;

class CubeControllerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CubeController::class,
            function ($app) {
                return new CubeController(
                    $app->make(CubeService::class)
                );
            }
        );
    }
}
