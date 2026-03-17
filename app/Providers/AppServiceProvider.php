<?php

namespace App\Providers;

use EinarHansen\FootballData\FootballDataService;
use EinarHansen\Http\RateLimit\Psr16RateLimitState;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FootballDataService::class, function ($app) {
            return new FootballDataService(
                apiToken: $app['config']['services']['football-data']['api-token'],
                client: new Client(),
                rateLimiterState: new Psr16RateLimitState(
                   cacheKey: 'football-data',
                   cache: $app->make('cache.store'), 
                   maxAttempts: 10,
                   decaySeconds: 60,
                )
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
