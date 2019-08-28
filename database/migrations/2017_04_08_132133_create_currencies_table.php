<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('code', 10);
            $table->char('symbol', 10);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $currencies = [
            [
                'name' => 'currency 1',
                'code' => '1',
                'symbol' => 'INR'
            ],

            [
                'name' => 'currency 2',
                'code' => '2',
                'symbol' => 'INR'
            ],

            [
                'name' => 'currency 3',
                'code' => '3',
                'symbol' => 'INR'
            ],

            [
                'name' => 'currency 4',
                'code' => '4',
                'symbol' => 'INR'
            ],

            [
                'name' => 'currency 5',
                'code' => '5',
                'symbol' => 'INR'
            ]
        ];

        DB::table('currencies')->insert($currencies);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}

