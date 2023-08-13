<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Eloquent\EloquentBaseRepository;
use App\Repositories\Eloquent\EloquentEventRepository;
use App\Repositories\EventRepository;
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
        $this->app->bind(EventRepository::class, EloquentEventRepository::class);
        $this->app->bind(BaseRepository::class, EloquentBaseRepository::class);
    }
}
