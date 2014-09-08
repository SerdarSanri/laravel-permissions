<?php
namespace Aeolu\Permissions\Models;

use Eloquent;

/**
 * Role Model
 *
 * @package Aeolu\Permissions\Models
 * @author  Jaggy Gauran<jaggygauran@gmail.com>
 * @license http://www.wtfpl.net/ Do What the Fuck You Want to Public License
 * @version 0.1.0
 * @since   Class available since Release 0.1.0
 */
class Role extends Eloquent
{

    /**
     * Table name
     *
     * @var    string
     * @access protected
     */
    protected $table = 'roles';

    /**
     * Mass Assignment
     *
     * @var    array
     * @access protected
     */
    protected $fillable = ['name', 'description'];


    /* public resources() {{{ */
    /**
     * it belongs to many resources
     *
     * @access public
     * @return Relationship
     */
    public function resources()
    {
        return $this->belongsToMany('Aeolu\Permissions\Models\Resource', 'permissions');
    }
    /* }}} */
}
