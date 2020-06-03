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
        UiCommand::macro('react-bootstrap', function ($command) {

            FrontendRbsPreset::install($command);
            ApplicationPreset::install($command, 'bootstrap');

            $command->comment('Please run "npm install && npm run watch" to compile your fresh scaffolding.');
        });
        UiCommand::macro('react-tailwind', function ($command) {

            FrontendRtwPreset::install($command);
            ApplicationPreset::install($command, 'tailwind');

            $command->comment('Please run "npm install && npm run watch" to compile your fresh scaffolding.');
        });
    }
}
