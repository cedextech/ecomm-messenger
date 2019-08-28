<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('banner');
            $table->string('address', 500);
            $table->string('latitude', 25);
            $table->string('longitude', 25);
            $table->string('phone', 15)->nullable();
            $table->string('email')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('notification_email')->nullable();
            $table->string('notification_mobile')->nullable();
            $table->integer('currency_id')->unsigned()->default(1);
            $table->integer('language_id')->unsigned()->default(1);
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('timezone')->default('Europe/Amsterdam');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::table('shops', function(Blueprint $table) {
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
