<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permisssion_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id','user_id'
    ];
}
