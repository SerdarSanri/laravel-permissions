<?php
namespace Aeolu\Permissions\Models;

use Eloquent;

/**
 * Resources Model
 *
 * @package Aeolu\Permissions
 * @author  Jaggy Gauran<jaggygauran@gmail.com>
 * @license http://www.wtfpl.net/ Do What the Fuck You Want to Public License
 * @version 0.1.0
 * @since   Class available since Release 0.1.0
 */
class Resource extends Eloquent
{

    /**
     * Table
     *
     * @var    string
     * @access protected
     */
    protected $table = 'resources';

    /**
     * Mass Assignment
     *
     * @var    array
     * @access protected
     */
    protected $fillable = ['name', 'action', 'url', 'parent_id'];

    /**
     * No timestamps
     *
     * @var    boolean
     * @access public
     */
    public $timestamps = false;


    /* public children() {{{ */
    /**
     * it can have many children
     *
     * @access public
     * @return Relationship|null
     */
    public function children()
    {
        return $this->hasMany(get_called_class(), 'parent_id');
    }
    /* }}} */


    /* public parent() {{{ */
    /**
     * it can have a parent
     *
     * @access public
     * @return Relationship|null
     */
    public function parent()
    {
        return $this->belongsTo(get_called_class(), 'parent_id');
    }
    /* }}} */


    /* public roles() {{{ */
    /**
     * it has and belongs to many roles
     *
     * @access public
     * @return Relationship
     */
    public function roles()
    {
        return $this->belongsToMany('Aeolu\Permissions\Models\Role', 'permissions');
    }
    /* }}} */
}
