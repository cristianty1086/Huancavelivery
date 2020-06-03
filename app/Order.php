<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shipment','cart','supplier_id','billing_id','user_id','estado','observacion','user_delivery_id','dia_entrega','hora_entrega'
    ];
}
