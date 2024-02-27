<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

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
        Http::macro('strapi', function () {
            return Http::withHeaders([
                'Authorization' => 'Bearer '. config('strapi.token'), #Token generated in the admin
            ])->baseUrl(config('strapi.url')); # Base url of your strapi app
        });
    }
}
