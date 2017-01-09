<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaToppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pizza_topping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pizza_id')->unsigned();
            $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('SET NULL');
            $table->integer('topping_id')->unsigned();
            $table->foreign('topping_id')->references('id')->on('toppings')->onDelete('SET NULL');
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
        //
        Schema::dropIfExists('pizza_topping');

    }
}
