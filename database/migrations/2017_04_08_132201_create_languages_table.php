<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('code', 10);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $languages = [
            [
                'name' => 'language 1',
                'code' => '1'
            ],

            [
                'name' => 'language 2',
                'code' => '2'
            ],

            [
                'name' => 'language 3',
                'code' => '3'
            ],

            [
                'name' => 'language 4',
                'code' => '4'
            ],

            [
                'name' => 'language 5',
                'code' => '5'
            ]
        ];

        DB::table('languages')->insert($languages);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
