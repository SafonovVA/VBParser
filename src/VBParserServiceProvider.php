<?php

namespace SafonovVA\VBParser;

use Illuminate\Support\ServiceProvider;

class VBParserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Test::class, function ($app) {
            return new Test();
        });
    }
}
