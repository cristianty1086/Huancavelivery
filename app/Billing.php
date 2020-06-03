<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres','apellidos','email','telefono','direccion','distrito','provincia','barrio','estado','importeTotal','pesoTotal','user_id','efectivo_pagara','efectivo_vuelto','tipo_pago'
    ];
}
