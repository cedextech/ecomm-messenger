<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->decimal('tax_amount', 5, 2)->default(0.0)->after('tax');
            $table->decimal('total', 5, 2)->after('delivery_fee'); // tax_amount + delivery_fee
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
            $table->dropColumn('tax_amount');
            $table->dropColumn('total');
        });
    }
}
