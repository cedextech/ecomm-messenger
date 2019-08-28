<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameMenusToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign('menus_shop_id_foreign');
            $table->dropForeign('menus_category_id_foreign');
        });

        Schema::rename('menus', 'products');

        Schema::table('products', function(Blueprint $table) {
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
        //
    }
}
