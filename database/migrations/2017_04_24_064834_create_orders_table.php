<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->uuid('id');
            $table->integer('shop_id')->unsigned();
            $table->decimal('subtotal', 5, 2);
            $table->decimal('tax', 5, 2);
            $table->decimal('delivery_fee', 5, 2);
            $table->string('notes', 255);
            $table->string('special_request', 255);
            $table->string('checkout_type', 50);
            $table->string('payment_mode', 50);
            $table->string('payment_status', 50);
            $table->string('status', 50);
            $table->timestamps();
        });

        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shops');
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
