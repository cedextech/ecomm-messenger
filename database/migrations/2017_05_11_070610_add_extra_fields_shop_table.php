<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldsShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('shops', function(Blueprint $table){
            $table->decimal('delivery_fee', 5, 2)->default(0.0)->after('tax_type');
            $table->decimal('delivery_amount_minimum', 5, 2)->default(0.0)->after('delivery_fee');
            $table->string('google_analytics_id', 20)->nullable()->after('delivery_amount_minimum');
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
