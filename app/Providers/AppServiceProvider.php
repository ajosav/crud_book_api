<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\User;
use App\Observers\BookObserver;
use App\Services\BookServices;
use App\Services\UserTokenService;
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
        $this->app->singleton(UserTokenService::class, function() {
            return new UserTokenService(new User());
        });

        $this->app->singleton('BookService', function() {
            return new BookServices();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Book::observe(BookObserver::class);
    }
}
