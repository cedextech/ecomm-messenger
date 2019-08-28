<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('customer_shop_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });

        Schema::table('carts', function(Blueprint $table) {
            $table->foreign('customer_shop_id')->references('id')->on('customer_shop');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
