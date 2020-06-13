<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug'
    ];

    public function users() {

       return $this->belongsToMany('App\User');

    }

    public function roles() {

        return $this->belongsToMany('App\Role');

     }

}
