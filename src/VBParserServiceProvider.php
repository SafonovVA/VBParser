<?php

namespace SafonovVA\VBParser;

use Illuminate\Support\ServiceProvider;
use SafonovVA\VBParser\Console\ParseDataRows;

class VBParserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Test::class, function ($app) {
            return new Test();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ParseDataRows::class,
            ]);
        }
    }
}
