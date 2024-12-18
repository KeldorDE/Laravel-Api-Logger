<?php

namespace KeldorDE\ApiLogger;

use Illuminate\Support\ServiceProvider;
use KeldorDE\ApiLogger\Logger\ApiLogChannel;
use Monolog\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Log\LogManager;

class ApiLoggerServiceProvider extends ServiceProvider
{
    public function boot(LogManager $logManager): void
    {
        $this->publishes([
            __DIR__.'/../config/api-logger.php' => config_path('api-logger.php'),
        ], 'config');

        $logManager->extend('api', function ($app, array $config) {
            $channel = new ApiLogChannel();
            return $channel($config);
        });
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/api-logger.php', 'api-logger'
        );

        $this->app->singleton('log.channels.api', function ($app) {
            return new ApiLogChannel();
        });
    }
}
