<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmcBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emc_blog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id');
            $table->integer('gallery_id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->text('content'); 
            $table->integer('like_count');
            $table->integer('seen_count');
            $table->integer('comment_count');
            $table->text('tags');
            $table->integer('status');
            $table->integer('priority');
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
        Schema::drop('emc_blog');
    }
}
