<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);

        $gitTag = trim(shell_exec('git describe --tags --abbrev=0'));
        View::share('gitTag', $gitTag);
    }

    protected $policies = [
        User::class => UserPolicy::class,
    ];
}
