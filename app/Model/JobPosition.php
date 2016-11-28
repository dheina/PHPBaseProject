<?php
/**
 * Created by PhpStorm.
 * User: dheina
 * Date: 28/11/16
 * Time: 7:22 PM
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    /**
     * Set timestamps off
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_position';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get users with a certain role
     */
    public function users()
    {
        return $this->hasMany('App\Model\User', 'job_position');
    }



}