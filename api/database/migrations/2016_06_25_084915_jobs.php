<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('country', 70);
            $table->string('city', 70);
            $table->string('postal_code', 5);
            $table->longText('entreprise_desc',6000);
            $table->longText('message',6000);
            $table->string('lang', 50); 
            $table->string('graduation', 50);
            $table->float('salary'); 
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
        Schema::drop('jobs');
    }
}
