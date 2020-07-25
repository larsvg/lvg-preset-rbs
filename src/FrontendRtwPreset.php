<?php

namespace larsvg\PresetRbs;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset as LaravelPreset;

class FrontendRtwPreset extends LaravelPreset
{

    /**
     * Install the preset.
     *
     * @param Application $command
     *
     * @return void
     */
    public static function install($command)
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateBootstrapping();
        static::updateComponent();
        static::removeNodeModules();

        $command->info('Frontend scaffolding with React JS and Tailwind CSS');
    }



    /**
     * Update the given package array.
     *
     * @param array $packages
     *
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
                '@babel/preset-react'     => '^7.0.0',
                'react'                   => '^16.2.0',
                'react-dom'               => '^16.2.0',
                'tailwindcss'             => '^1.4.6',
                'laravel-mix-purgecss'    => '^5.0.0',
                'glob-all'                => '^3.2.1',
                'purgecss-webpack-plugin' => '^2.2.0',
            ] + Arr::except($packages, [
                'vue',
                'vue-template-compiler',
                'bootstrap',
                'jquery',
                'popper.js',
            ]);
    }



    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__ . '/stubs/assets/react-tailwind/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__ . '/stubs/assets/react-tailwind/tailwind.config.js', base_path('tailwind.config.js'));
    }



    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete(
            resource_path('js/components/ExampleComponent.vue')
        );

        copy(
            __DIR__ . '/stubs/assets/react/Example.js',
            resource_path('js/components/Example.js')
        );
    }



    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__ . '/stubs/assets/react-tailwind/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/stubs/assets/react-tailwind/app.scss', resource_path('sass/app.scss'));
    }

}
