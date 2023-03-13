<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CubeService;
use App\Contracts\CubeRepositoryInterface;

class CubeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CubeService::class,
            function ($app) {
                return new CubeService(
                    $app->make(CubeRepositoryInterface::class)
                );
            }
        );
    }
}
