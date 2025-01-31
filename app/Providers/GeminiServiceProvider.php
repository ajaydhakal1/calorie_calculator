<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class GeminiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('gemini', function () {
            return new Client([
                'base_uri' => 'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent',
                'timeout'  => 30.0,
            ]);
        });
    }

    public function boot()
    {
        //
    }
}
