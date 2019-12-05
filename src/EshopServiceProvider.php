<?php

namespace MwSpace\Eshop;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class EshopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {

        Route::middlewareGroup('eshop', config('eshop.middleware', []));

        $this->registerCommands();
        $this->registerRoutes();
        $this->registerMigrations();
        $this->registerPublishing();

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views', 'eshop'
        );
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Routes/eshop.php');
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
                Console\UpdateCommand::class,
            ]);
        }
    }

    /**
     * Get the e-shop route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace' => 'MwSpace\Eshop\Http\Controller',
            'prefix' => 'eshop',
            'middleware' => 'eshop',
        ];
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
     * Register the package's migrations.
     *
     * @return void
     */
    private function registerLanguages()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/la', 'courier');
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
                __DIR__ . '/../config/eshop.php' => config_path('eshop.php'),
            ], 'eshop-config');

            $this->publishes([
                __DIR__ . '/../stubs/EshopServiceProvider.stub' => app_path('Providers/EshopServiceProvider.php'),
            ], 'eshop-provider');

            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/eshop'),
            ], 'eshop-lang');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/eshop.php', 'eshop'
        );

        $this->registerStorageDriver();
    }

    /**
     * Register the package storage driver.
     *
     * @return void
     */
    protected function registerStorageDriver()
    {
        $driver = config('eshop.driver');

        if (method_exists($this, $method = 'register' . ucfirst($driver) . 'Driver')) {
            $this->$method();
        }
    }

}
