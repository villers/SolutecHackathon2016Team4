<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AchievementsList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements_list', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('achievements_id')->unsigned();
            $table->boolean('has_read')->default(0);
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
        Schema::drop('achievements_list');
    }
}
