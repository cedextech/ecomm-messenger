<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('facebook_id', 255);
            $table->string('country', 10)->nullable();
            $table->string('language', 10)->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('facebook_subscribed')->default(true);
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
        Schema::dropIfExists('customers');
    }
}
