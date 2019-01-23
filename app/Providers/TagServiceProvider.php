<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        return $this->app->bind(
            'App\Repositories\Contracts\TagRepositoryInterface',
            'App\Repositories\Eloquents\TagRepository'
        );
    }
}
