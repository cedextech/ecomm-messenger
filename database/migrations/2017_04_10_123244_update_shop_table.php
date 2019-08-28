<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // taxt_type
        // 1 - Menu prices already include taxes
        // 2 - Apply tax on top of my menu prices

        Schema::table('shops', function(Blueprint $table){
            $table->boolean('has_delivery')->default(true)->after('timezone');
            $table->boolean('has_pickup')->default(true)->after('has_delivery');
            $table->boolean('delivery_payment_cash')->default(true)->after('has_pickup');
            $table->boolean('delivery_payment_card')->default(true)->after('delivery_payment_cash');
            $table->boolean('pickup_payment_cash')->default(true)->after('delivery_payment_card');
            $table->boolean('pickup_payment_card')->default(true)->after('pickup_payment_cash');
            $table->decimal('tax', 5, 2)->default(0.0)->after('pickup_payment_card');
            $table->tinyInteger('tax_type')->default(1)->after('tax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('has_delivery');
            $table->dropColumn('has_pickup');
            $table->dropColumn('delivery_payment_cash');
            $table->dropColumn('delivery_payment_card');
            $table->dropColumn('pickup_payment_cash');
            $table->dropColumn('pickup_payment_card');
            $table->dropColumn('tax');
            $table->dropColumn('tax_type');
        });
    }
}
