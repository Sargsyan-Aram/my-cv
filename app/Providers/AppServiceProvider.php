<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $mainPath = database_path('migrations');
        $directories = glob($mainPath . '/*' , GLOB_ONLYDIR);
        $migrationsInModules = $this->getMigrationPaths();
        $paths = array_merge([$mainPath], $directories, $migrationsInModules);

        $this->loadMigrationsFrom($paths);
    }

    /**
     * @return array
     */
    private function getMigrationPaths(): array
    {
        $modulesPath = app_path('Modules');
        $modules = scandir($modulesPath);
        $paths = [];

        foreach ($modules as $module) {
            if ($module === '.' or $module === '..') {
                continue;
            }

            $paths[] = $modulesPath
                . DIRECTORY_SEPARATOR
                . $module
                . DIRECTORY_SEPARATOR
                . 'Migrations';
        }

        return $paths;
    }
}
