<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_cate_id')->unsigned();
            $table->integer('news_user_id')->unsigned();
            $table->string('news_title');
            $table->string('news_slug');
            $table->string('news_description');
            $table->text('news_content');
            $table->integer('news_view');
            $table->tinyInteger('news_is_hot');
            $table->tinyInteger('news_is_check');
            $table->tinyInteger('news_is_public');
            $table->string('news_images');
            $table->string('news_image_thumbnail');
            $table->foreign('news_cate_id')->references('id')->on('sub_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('news_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
}
