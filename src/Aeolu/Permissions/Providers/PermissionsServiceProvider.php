<?php
namespace Aeolu\Permissions\Providers;

use Route;
use Illuminate\Support\ServiceProvider;

/**
 * PermissionsServiceProvider
 *
 * @uses    ServiceProvider
 * @package Aeolu\Permissions\ServiceProvider
 * @author  Jaggy Gauran<jaggygauran@gmail.com>
 * @license http://www.wtfpl.net/ Do What the Fuck You Want to Public License
 * @version 0.1.0
 * @since   Class available since Release 0.1.0
 */
class PermissionsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Route::filter('permissions', 'Aeolu\Permissions\Filters\PermissionsFilter');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

}
