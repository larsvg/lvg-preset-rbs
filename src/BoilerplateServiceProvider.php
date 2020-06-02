<?php

namespace larsvg\PresetRbs;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class BoilerplateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        UiCommand::macro('lvgbp', function ($command) {

            FrontendPreset::install($command);
            ApplicationPreset::install($command);

            $command->comment('Please run "npm install && npm run watch" to compile your fresh scaffolding.');
        });
    }
}
