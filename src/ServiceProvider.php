<?php

namespace Ambiene\Papyrus;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . "/../config/papyrus.php" => config_path(
                    "papyrus.php"
                ),
            ],
            "config"
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("papyrus", function () {
            return new Papyrus();
        });
    }
}
