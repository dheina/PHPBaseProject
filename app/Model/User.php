<?php
/**
 * Created by PhpStorm.
 * User: dheina
 * Date: 14/10/16
 * Time: 2:12 PM
 */


namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'username', 'first_name', "last_name", 'phone', 'email', 'password', 'job_position','avatar','avatar_thumb' ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the roles a user has
     */
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'user_role');
    }

    /**
     * Get Job Position
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jobPosition()
    {
        return $this->hasOne('App\Model\JobPosition','job_position');
    }

    /**
     * Add roles to user to make them a concierge
     *
     * @param $jobPositionId
     * @throws \Exception
     */

    public function makePermission($jobPositionId)
    {
        $assigned_roles = array();
        switch ($jobPositionId) {
            case 1:
                $roles = Role::all()->toArray();
                foreach ($roles as $value) {
                    $assigned_roles[] = $value['id'];
                }
                break;
            case 2:
                break;
            default:
                throw new \Exception("The employee status entered does not exist");
                break;
        }

        $this->roles()->attach($assigned_roles);
    }


    public function hasRole($role)
    {
        $roles = $this->roles()->get()->toArray();
        foreach ($roles as $value) {
            if(strtolower($role) == strtolower($value['machine_name'])){
                return true;
            }
        }
        return false;
    }

}