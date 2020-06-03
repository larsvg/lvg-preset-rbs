<?php

namespace larsvg\PresetRbs;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\Preset as LaravelPreset;
use Symfony\Component\Finder\SplFileInfo;

class ApplicationPreset extends LaravelPreset
{

    public static function install($command, $viewPath = 'bootstrap')
    {
        static::configureControllers();
        static::configureRoutes();
        static::configureViews($viewPath);

        $command->info('Backend scaffolding of views, route and controller structure.');
    }



    private static function configureControllers()
    {
        static::copyApplicationFolderContents('/stubs/Controllers/Frontend', 'Http/Controllers/Frontend');
        static::copyApplicationFolderContents('/stubs/Controllers/Backend', 'Http/Controllers/Backend');
    }



    private static function configureRoutes()
    {
        copy(
            __DIR__ . '/stubs/Routes/web.stub',
            base_path('/routes/web.php')
        );
    }



    private static function configureViews($viewPath)
    {
        (new Filesystem)->delete(
            resource_path('views/welcome.blade.php')
        );

        static::copyResourceFolderContents('/stubs/Views/'.$viewPath.'/backend/home', 'views/backend/home');
        static::copyResourceFolderContents('/stubs/Views/'.$viewPath.'/frontend/home', 'views/frontend/home');
        static::copyResourceFolderContents('/stubs/Views/'.$viewPath.'/layouts/backend', 'views/layouts/backend');
        static::copyResourceFolderContents('/stubs/Views/'.$viewPath.'/layouts/frontend', 'views/layouts/frontend');

        copy(
            __DIR__ . '/stubs/Views/'.$viewPath.'/layouts/meta.blade.php',
            resource_path('/views/layouts/meta.blade.php')
        );
    }



    private static function copyResourceFolderContents(string $from, string $to)
    {
        if (!is_dir($directory = resource_path($to))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__ . $from))
            ->each(function(SplFileInfo $file) use ($filesystem, $to) {
                $filesystem->copy(
                    $file->getPathname(),
                    resource_path($to . '/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });
    }



    private static function copyApplicationFolderContents(string $from, string $to)
    {
        if (!is_dir($directory = app_path($to))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__ . $from))
            ->each(function(SplFileInfo $file) use ($filesystem, $to) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path($to . '/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });
    }

}
