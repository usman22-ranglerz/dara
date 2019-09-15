<?php

namespace ProfUsman\MonitorOperators;

use Illuminate\Support\ServiceProvider;
use ProfUsman\MonitorOperators\MonitorJar;

class MonitorOperatorsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/config.php', 'monitor_operators');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/Config/config.php' => config_path('monitor_operators.php'),
            ], 'config');
        }

        $this->publishes([
            __DIR__.'/Migrations/create_monitor_operators_table.php' => database_path('migrations/2019_09_04_085052_create_monitor_operators_table.php'),
        ], 'migrations');

        $this->app->singleton('monitor', function($app)
        {
            return new MonitorJar(
                config('monitor_operators')
            );
        });
    }
}
