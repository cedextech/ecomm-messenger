<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('name', 255);
            $table->string('description', 255)->nullable();
            $table->float('price', 8, 2);
            $table->float('price_discount', 8, 2)->nullable();;
            $table->string('image', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::table('menus', function(Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
