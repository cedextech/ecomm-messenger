<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderAddressesFieldZipcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_addresses', function(Blueprint $table){
            $table->string('zipcode', 10)->nullable()->after('location');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_addresses', function (Blueprint $table) {
            $table->dropColumn('zipcode');            
        });
    }
}
