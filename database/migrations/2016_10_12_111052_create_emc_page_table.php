<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmcPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emc_page', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id');
            $table->integer('gallery_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('content');
            $table->string('keyword');
            $table->integer('priority');
            $table->integer('parent');
            $table->integer('status');
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
        Schema::drop('emc_page');
    }
}
