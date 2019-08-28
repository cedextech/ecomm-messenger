<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePriceFieldsToDecimal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function(Blueprint $table){
            $table->decimal('delivery_fee', 10, 2)->change();
            $table->decimal('delivery_amount_minimum', 10, 2)->change();
            $table->decimal('tax', 10, 2)->change();
        });

        Schema::table('products', function(Blueprint $table){
            $table->decimal('price', 10, 2)->change();
            $table->decimal('price_discount', 10, 2)->change();
        });

        Schema::table('orders', function(Blueprint $table){
            $table->decimal('subtotal', 10, 2)->change();
            $table->decimal('tax', 10, 2)->change();
            $table->decimal('tax_amount', 10, 2)->change();
            $table->decimal('delivery_fee', 10, 2)->change();
            $table->decimal('total', 10, 2)->change();
        });

        Schema::table('order_products', function(Blueprint $table){
            $table->decimal('price', 10, 2)->change();
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
    }
}
