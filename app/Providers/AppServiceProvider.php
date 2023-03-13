<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CubeRepositoryInterface;
use App\Repositories\CubeStorageRepository;
use App\Repositories\CubeAbstractStorageRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CubeRepositoryInterface::class,
            CubeStorageRepository::class
            #CubeAbstractStorageRepository::class
        );
    }
}
