<?php

namespace Ecommerce\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class SourceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadViewsFrom(sharedPathOnBoundedContext('Infrastructure/Resources/views/'), 'views');
        $this->app->bind('Ecommerce', function () {
            //return new Marketplace;
        });
    }

    public function boot()
    {
        $migrationPath = sharedPath('Infrastructure/Database/migrations/');
        $seederPath = sharedPath('Infrastructure/Database/seeders/DatabaseSeeder.php');
        $configPath = sharedPath('Infrastructure/Config/setting.php');
        $assetsPath = sharedPathOnBoundedContext('Infrastructure/Resources/assets');
        $languagePath = sharedPathOnBoundedContext('Infrastructure/Resources/lang');

        $this->publishes([$seederPath => database_path('seeders/DatabaseSeeder.php')], 'marketplace.seeders');
        $this->publishes([$assetsPath => base_path('public/assets')], 'marketplace.assets');
        $this->publishes([$languagePath => base_path('resources/lang')], 'marketplace.lang');
        $this->publishes([$configPath => config_path('setting.php')], 'marketplace.config');

        $this->loadMigrationsFrom($migrationPath);
        $this->mergeConfigFrom($configPath, 'marketplace');

        $this->commands([]);
    }
}
