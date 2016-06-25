<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users2AddColumn extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('phone_number', 20);
            $table->string('picture', 255);
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