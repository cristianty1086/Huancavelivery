<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->string('name',64);
            $table->integer('estado')->default(1);
            $table->string('ruc',32)->nullable();
            $table->string('logo',128)->default("");
            $table->string('descripcion',255);
            $table->string('direccion',128);
            $table->decimal('latitude',15,3)->default(0);
            $table->decimal('longitude',15,3)->default(0);
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
        Schema::dropIfExists('suppliers');
    }
}
