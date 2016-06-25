<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddColumn extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('graduation', 255);
            $table->string('lang', 50);
            $table->boolean('can_drive')->default(0);
        });
    }

    public function down()
    {
        //
    }

}
