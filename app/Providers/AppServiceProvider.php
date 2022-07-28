<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'y5wkqf5b46xztn84',
                    'publicKey' => 'p9rntxdjdkwnt7kh',
                    'privateKey' => 'c7eacb1eb6a6b78c7d2f30d3e2933d97'
                ]
            );
        });
    }
}