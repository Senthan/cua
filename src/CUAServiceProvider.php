<?php

namespace Jeylabs\CUA;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container as Application;

class CUAServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $source = __DIR__ . '/config/cua.php';
        $this->publishes([$source => config_path('cua.php')]);
        $this->mergeConfigFrom($source, 'cua');
    }

    public function register()
    {
        $this->registerBindings($this->app);
    }

    protected function registerBindings(Application $app)
    {
        $app->singleton('cua', function ($app) {
            $config = $app['config'];
            return new Cua(
                $config->get('cua.access_token', null),
                $config->get('cua.async_requests', false)
            );
        });
        $app->alias('cua', CUA::class);

    }
}
