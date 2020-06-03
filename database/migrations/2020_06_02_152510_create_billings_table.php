<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',128);
            $table->string('apellidos',128);
            $table->string('email',32);
            $table->string('telefono',32);
            $table->string('direccion',128);
            $table->string('distrito',64)->nullable();
            $table->string('provincia',64)->nullable();
            $table->string('barrio',64)->nullable();
            $table->integer('estado');
            $table->float('importeTotal');
            $table->float('pesoTotal');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->float('efectivo_pagara')->nullable();
            $table->float('efectivo_vuelto')->nullable();
            $table->string('tipo_pago',128)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billings');
    }
}
