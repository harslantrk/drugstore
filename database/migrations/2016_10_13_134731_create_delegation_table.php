<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelegationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('emc_delegation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('auth');            
            $table->enum('status',array('0','1'));

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
     
        Schema::drop('emc_delegation');
    }
}
