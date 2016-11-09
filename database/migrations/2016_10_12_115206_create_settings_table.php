<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('icon');
            $table->text('logo');
            $table->string('name');
            $table->string('web_site');
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->text('address');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('google_plus');
            $table->string('youtube');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('analytics_code');
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
        Schema::drop('settings');
    }
}
