<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado','ruc','logo','descripcion','direccion','telefono','email','name'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Get the comments for the blog post.
     */
    public function guarniciones()
    {
        return $this->hasMany('App\Guarnicion');
    }

    /**
     * Get the post that owns the comment.
     */
    public function categoria()
    {
        return $this->belongsTo('App\Category');
    }

    public function users() {

       return $this->belongsToMany('App\User');

    }
}
