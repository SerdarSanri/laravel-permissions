<?php
namespace Aeolu\Permissions\Filters;

use Auth;
use Route;
use Request;
use Response;
use Redirect;
use skd\models\Resource;

/**
 * PermissionsFilter
 *
 * @uses    ServiceProvider
 * @package Aeolu\Permissions\Filters
 * @author  Jaggy Gauran<jaggygauran@gmail.com>
 * @license http://www.wtfpl.net/ Do What the Fuck You Want to Public License
 * @version 0.1.0
 * @since   Class available since Release 0.1.0
 */
class PermissionsFilter
{

    /* protected isRestricted() {{{ */
    /**
     * Detect account restrictions
     *
     * @access protected
     * @return void
     */
    protected function isRestricted()
    {
        $restricted = true;
        $resources  = Auth::user()->role->resources;

        // split the actions
        list($controller, $action) = explode('@', Route::currentRouteAction());

        // if null, account is allowed to go anywhere
        if ($resources->isEmpty()) {
            return false;
        }

        foreach ($resources as $resource) {
            // global access to the controller
            $hasControllerAccess = ($resource->name === $controller);
            if ($hasControllerAccess) {
                $restricted = false;
                break;
            }

            if (!$resource->parent_id) {
                continue;
            }

            $hasSameParent = ($resource->parent->name === $controller);
            $hasSameAction = ($resource->action === $action);
            if ($hasSameParent && $hasSameAction) {
                $restricted = false;
                break;
            }
        }

        return $restricted;
    }
    /* }}} */


    /* protected validateGuest() {{{ */
    /**
     * Check if the status is not logged in
     *
     * @access protected
     * @return mixed
     */
    protected function isNotLoggedIn()
    {
        if (Auth::guest()) {
            if (Request::ajax()) {
                return Response::make('Unauthorized', 401);
            } else {
                return Redirect::guest('login');
            }
        }

        return false;
    }
    /* }}} */


    /* public filter() {{{ */
    /**
     * Filter
     *
     * @access public
     * @return void
     */
    public function filter()
    {
        if ($response = $this->isNotLoggedIn()) {
            return $response;
        }

        if ($this->isRestricted()) {
            return Redirect::home();
        }

    }
    /* }}} */
}

