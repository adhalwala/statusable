<?php

namespace Aecor\Status;

use Illuminate\Support\ServiceProvider;

class StatusServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/statusable.php' => config_path('statusable.php'),
            ], 'config');

            $migrationFileName = 'create_status_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/statusable.php', 'statusable');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
