<?php

namespace nattaponra\truemoney;

use Illuminate\Support\ServiceProvider;

class TrueMoneyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/config.php' => config_path('truemoney.php'),]);
    }


    public function register(){

        $this->app->singleton('truemoney', function () {
            return new TrueMoney();
        });
    }

}
