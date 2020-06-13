<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('shipment');
            $table->string('cart',32);
            $table->foreignId('supplier_id')->references('id')->on('suppliers');
            $table->foreignId('billing_id')->references('id')->on('billings');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('estado')->default(1);
            $table->string('observacion',128)->nullable();
            $table->bigInteger('user_delievry_id')->nullable();
            $table->date('dia_entrega')->nullable();
            $table->time('hora_entrega')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
