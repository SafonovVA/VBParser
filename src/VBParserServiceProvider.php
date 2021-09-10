<?php

namespace SafonovVA\VBParser;

use Illuminate\Support\ServiceProvider;
use SafonovVA\VBParser\Console\Commands\ParseAllData;
use SafonovVA\VBParser\Console\Commands\ParseDataRows;
use SafonovVA\VBParser\Console\Commands\ParseDataTypes;
use SafonovVA\VBParser\Console\Commands\ParseMenu;
use SafonovVA\VBParser\Console\Commands\ParseMenuItems;
use SafonovVA\VBParser\Console\Commands\ParseRoles;
use SafonovVA\VBParser\Console\Commands\ParseUserRole;
use SafonovVA\VBParser\Console\DataParser;

class VBParserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(DataParser::class, function ($app) {
            return new DataParser();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ParseAllData::class,
                ParseDataRows::class,
                ParseDataTypes::class,
                ParseMenu::class,
                ParseMenuItems::class,
                ParseRoles::class,
                ParseUserRole::class
            ]);
        }
    }
}
