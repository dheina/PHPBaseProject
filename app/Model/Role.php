<?php
/**
 * Created by PhpStorm.
 * User: dheina
 * Date: 14/10/16
 * Time: 2:09 PM
 */


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Set timestamps off
     */
    public $timestamps = false;

    protected $hidden = ['pivot'];

    /**
     * Get users with a certain role
     */
    public function users()
    {
        return $this->belongsToMany('App\Model\User', 'user_role');
    }
}
