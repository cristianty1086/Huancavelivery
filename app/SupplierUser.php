<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'supplier_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_id','user_id'
    ];
}
