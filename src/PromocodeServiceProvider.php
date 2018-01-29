<?php

namespace Backendidsiapps\Promocode;

use Illuminate\Support\ServiceProvider;

/**
 * Class InvitedUserServiceProvider
 * @package InvitedUser
 */
class PromocodeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
//    protected $defer = true;

    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }

    /**
     *
     */
    public function register()
    {
    }
}
