<?php
/**
 * Created by PhpStorm.
 * User: dheina
 * Date: 14/10/16
 * Time: 2:03 PM
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
    protected $table = 'errors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','message','desc'];

}