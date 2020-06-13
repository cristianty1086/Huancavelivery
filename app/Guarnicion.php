<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guarnicion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guarnicions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_id','name'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
