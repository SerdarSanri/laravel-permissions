<?php
namespace Aeolu\Permissions\Models;

use Eloquent;

/**
 * Resources
 *
 * @uses    Eloquent
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
}
