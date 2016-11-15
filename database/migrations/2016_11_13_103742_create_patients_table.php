<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients',function (Blueprint $table){
            $table->increments('id');
            $table->integer('status');
            $table->string('name');
            $table->string('tc_no')->unique();
            $table->string('phone');
            $table->timestamp('birthdate');
            $table->string('street');
            $table->string('district');
            $table->string('city');
            $table->string('apartment');
            $table->string('post_code');
            $table->string('school_name');
            $table->string('class');
            $table->string('educational');
            $table->text('detail');
            $table->integer('social_insurance');
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
        Schema::drop('patients');
    }
}
