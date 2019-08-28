<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameShopPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('shop_pages', function (Blueprint $table) {
            $table->dropForeign('shop_pages_page_id_foreign');
            $table->dropForeign('shop_pages_shop_id_foreign');
        });

        Schema::rename('shop_pages', 'page_shop');

        Schema::table('page_shop', function(Blueprint $table) {
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
        Schema::rename('page_shop', 'shop_pages');
    }
}
