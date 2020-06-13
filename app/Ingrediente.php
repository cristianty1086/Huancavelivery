<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ingredientes';

    /**
     * Get the post that owns the comment.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
