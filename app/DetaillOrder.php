<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetaillOrder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detaill_orders';

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id','product_id','amount','price','discount','weight'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
