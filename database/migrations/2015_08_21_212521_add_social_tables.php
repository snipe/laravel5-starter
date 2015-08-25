<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('social', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('service');
            $table->string('uid')->nullable();
            $table->timestamps();
            $table->string('access_token')->default(NULL)->nullable();
            $table->integer('end_of_life')->default(NULL)->nullable();
            $table->string('refresh_token')->default(NULL)->nullable();
            $table->string('request_token')->default(NULL)->nullable();
            $table->string('request_token_secret')->default(NULL)->nullable();
            $table->text('extra_params')->default(NULL)->nullable();
            $table->string('access_token_secret')->default(NULL)->nullable();

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
        Schema::drop('social');
    }
}
