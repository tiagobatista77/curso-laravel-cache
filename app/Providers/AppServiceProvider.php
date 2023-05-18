<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $Listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // quando algum cache for acionado
        'Illuminate\Cache\Events\CacheHit' => [
            'App\Listeners\LogCacheHit',
        ],

        // quando algum cache for perdido
        'Illuminate\Cache\Events\CacheMissed' => [
            'App\Listeners\LogCacheMissed',
        ],

        // quando algum cache for removido

        'Illuminate\Cache\Events\KeyForgotten' => [
            'App\Listeners\LogKeyForgotten',
        ],

        // quando algum cache for escrito
        'Illuminate\Cache\Events\KeyWritten' => [
            'App\Listeners\LogKeyWritten',
        ],
    ];

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
        //
    }
}
