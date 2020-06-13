<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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

    public function permissions() {

       return $this->belongsToMany('App\Permission');

    }
}
