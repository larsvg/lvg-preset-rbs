<?php

namespace larsvg\PresetRbs;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset as LaravelPreset;

class FrontendRbsPreset extends LaravelPreset
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

        $command->info('Frontend scaffolding with React JS and Bootstrap');
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
                '@babel/preset-react' => '^7.0.0',
                'react'               => '^16.2.0',
                'react-dom'           => '^16.2.0',
                'bootstrap'           => '^4.0.0',
                'jquery'              => '^3.2',
                'popper.js'           => '^1.12',
            ] + Arr::except($packages, [
                'vue',
                'vue-template-compiler',
            ]);
    }



    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__ . '/stubs/assets/react-bootstrap/webpack.mix.js', base_path('webpack.mix.js'));
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
        copy(__DIR__ . '/stubs/assets/react-bootstrap/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/stubs/assets/react-bootstrap/app.scss', resource_path('sass/app.scss'));
    }

}
