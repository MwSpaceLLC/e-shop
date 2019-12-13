<?php

/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as MineServiceProvider;

class ServiceProvider extends MineServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();

        $this->registerCommands();

        $this->registerMigrations();

        $this->registerPublishing();

        $this->registerLanguages();

        $this->registerViews();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group([
            'namespace' => 'MwSpace\Eshop\Http\Controller',
            'prefix' => config('e-shop.prefix') ?? 'e-shop',
            'middleware' => [
                'web',
                'MwSpace\Eshop\Http\Middleware\EshopPublic'
            ],
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/Routes/public.php');
        });

        Route::group([
            'namespace' => 'MwSpace\Eshop\Http\Controller',
            'prefix' => config('e-shop.prefix') ?? 'e-shop',
            'middleware' => [
                'web',
                'MwSpace\Eshop\Http\Middleware\EshopPrivate'
            ],
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/Routes/private.php');
        });
    }

    /**
     * Register the Artisan Commands
     */
    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\InstallCommand::class,
                Console\QueueCommand::class,
                Console\UpdateCommand::class,
            ]);
        }
    }

    /**
     * Register the package's migrations.
     *
     * @return void
     */
    private function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Migration');
        }
    }

    /**
     * Register the view's e-shop.
     *
     * @return void
     */
    private function registerViews()
    {
        $this->loadViewsFrom(
            __DIR__ . '/../resources/views', 'eshop'
        );
    }

    /**
     * Register the package's migrations.
     *
     * @return void
     */
    private function registerLanguages()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'eshop');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->configRuntime();

        $this->registerConfig();

        $this->registerStorageDriver();

    }

    /**
     * set queue at runtime for e-shop (Important)
     * e-shop php run with queue jobs
     */
    private function configRuntime()
    {
        config(['queue.default' => 'database']);
    }

    /**
     * registerConfig function (Important)
     */
    private function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/eshop.php', 'e-shop'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../config/guard.php', 'auth.guards'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../config/provider.php', 'auth.providers'
        );

//        dd($this->app['config']); // Check config (if not work clear config cache)
    }

    /**
     * Register the package storage driver.
     *
     * @return void
     */
    private function registerStorageDriver()
    {
        $driver = config('eshop.driver');

        if (method_exists($this, $method = 'register' . ucfirst($driver) . 'Driver')) {
            $this->$method();
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/Migration' => database_path('migrations'),
            ], 'eshop-migrations');

            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/eshop'),
            ], 'eshop-assets');

            $this->publishes([
                __DIR__ . '/../config/eshop.php' => config_path('e-shop.php'),
            ], 'eshop-config');

            $this->publishes([
                __DIR__ . '/../stubs/EshopServiceProvider.stub' => app_path('Providers/EshopServiceProvider.php'),
            ], 'eshop-provider');

            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/eshop'),
            ], 'eshop-lang');
        }
    }

}
