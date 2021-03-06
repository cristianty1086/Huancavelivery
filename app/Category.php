<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','descripcion','imagen'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function suppliers()
    {
        return $this->hasMany('App\Supplier');
    }
}
