<?php
namespace Aeolu\Permissions\Models;

use Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * User Model
 *
 * @package Aeolu\Permissions\Models
 * @author  Jaggy Gauran<jaggygauran@gmail.com>
 * @license http://www.wtfpl.net/ Do What the Fuck You Want to Public License
 * @version 0.1.0
 * @since   Class available since Release 0.1.0
 */
class User extends Eloquent implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Mass Assignment
     *
     * @var    array
     * @access protected
     */
    protected $fillable = ['username', 'password', 'role_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /* public role() {{{ */
    /**
     * it belongs to a role
     *
     * @access public
     * @return Relationship
     */
    public function role()
    {
        return $this->belongsTo('Aeolu\Permissions\Models\Role');
    }
    /* }}} */
}
