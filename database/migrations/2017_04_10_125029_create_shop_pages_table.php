<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->integer('shop_id')->unsigned();
            $table->string('title');
            $table->text('content');
            //$table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::table('shop_pages', function(Blueprint $table) {
            $table->foreign('page_id')->references('id')->on('pages');
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
        Schema::dropIfExists('shop_pages');
    }
}