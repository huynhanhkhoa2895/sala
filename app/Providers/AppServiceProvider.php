<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
use Illuminate\Pagination\Paginator;
>>>>>>> cb7c420da7a926ad983e8de146610a4509adef45
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
        //
<<<<<<< HEAD
	Schema::defaultStringLength(191);
=======
        Paginator::useBootstrap();
>>>>>>> cb7c420da7a926ad983e8de146610a4509adef45
    }
}
