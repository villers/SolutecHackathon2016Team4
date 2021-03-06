<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->integer('points')->unsigned()->default(0);
            $table->string('last_name', 35);
            $table->string('first_name', 35);
            $table->string('login', 15)->unique();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('country', 70);
            $table->string('city', 70);
             $table->string('postal_code', 5);
            $table->integer('address_number')->unsigned();
            $table->string('address', 70);
            $table->boolean('is_active')->default(0);
            $table->string('token_active');
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
        Schema::drop('users');
    }
}
