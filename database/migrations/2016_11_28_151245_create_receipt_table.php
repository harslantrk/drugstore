<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt',function (Blueprint $table){
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('report_id');
            $table->timestamp('start_date');
            $table->timestamp('finish_date');
            $table->integer('quantity');
            $table->string('unit_price');
            $table->string('sum');//KDV siz Toplam
            $table->string('total');//KDV li Toplam
            $table->string('detail');
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
        Schema::drop('receipt');
    }
}
