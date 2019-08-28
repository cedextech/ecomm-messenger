<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->time('opening_1');
            $table->time('closing_1');
            $table->time('opening_2');
            $table->time('closing_2');
            $table->boolean('opened_or_closed')->default(true);
            $table->integer('shop_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('shop_hours', function(Blueprint $table) {
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
        Schema::dropIfExists('shop_hours');
    }
}
