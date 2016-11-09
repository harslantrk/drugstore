<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name');
            $table->string('description');
            $table->text('content');
            $table->text('image');
            $table->integer('stock');
            $table->integer('price');
            $table->integer('seen_count');
            $table->integer('like_count');
            $table->string('tags');
            $table->text('options');
            $table->integer('priority');
            $table->integer('display');
            $table->integer('status');
            $table->integer('author');
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
        Schema::drop('products');
    }
}
