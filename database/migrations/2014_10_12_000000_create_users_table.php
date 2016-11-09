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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('remember_token');
            $table->text('picture');
            $table->integer('group_id');
            $table->string('last_seen');
            $table->string('ip_address');
            $table->string('web_site');
            $table->string('address');
            $table->string('email_code');
            $table->integer('email_confirmed');
            $table->string('sms_code');
            $table->integer('sms_confirmed');
            $table->string('social');
            $table->integer('status');
            $table->integer('delegation_id');
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
