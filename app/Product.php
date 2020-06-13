<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_id','nombre','descripcion','price','descuento','imagen'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    /**
     * Get the comments for the blog post.
     */
    public function ingredientes()
    {
        return $this->hasMany('App\Ingrediente');
    }
}
