<?php

namespace Internexus\Watcher;

use Internexus\Watcher\Providers\DatabaseQueryServiceProvider;
use Internexus\Watcher\Providers\NotificationServiceProvider;
use Internexus\Watcher\Providers\ExceptionsServiceProvider;
use Internexus\Watcher\Providers\CommandServiceProvider;
use Internexus\Watcher\Providers\EmailServiceProvider;
use Internexus\Watcher\Providers\JobServiceProvider;
use Internexus\Watcher\Commands\TestCommand;

use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Support\ServiceProvider;

class WatcherServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/watcher.php', 'watcher'
        );

        $this->app->singleton('watcher', function () {
            $config = new Config(config('watcher.url'), config('watcher.key'));

            return new Watcher($config);
        });

        $this->registerServiceProviders();
    }

    /**
     * Setup configuration file.
     *
     * @return void
     */
    protected function setupConfigFile()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/watcher.php' => config_path('watcher.php')
            ], 'config');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('watcher');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfigFile();

        if ($this->app->runningInConsole()) {
            $this->commands([
                TestCommand::class,
            ]);
        }
    }

    /**
     * Register all services providers.
     *
     * @return void
     */
    protected function registerServiceProviders()
    {
        if ($this->app->runningInConsole()) {
            $this->app->register(CommandServiceProvider::class);
        }

        if (config('watcher.job')) {
            $this->app->register(JobServiceProvider::class);
        }

        if (config('watcher.email')) {
            $this->app->register(EmailServiceProvider::class);
        }

        if (config('watcher.unhandled_exceptions')) {
            $this->app->register(ExceptionsServiceProvider::class);
        }

        if (config('watcher.notifications')) {
            $this->app->register(NotificationServiceProvider::class);
        }

        if(config('watcher.query')){
            $this->app->register(DatabaseQueryServiceProvider::class);
        }
    }
}
