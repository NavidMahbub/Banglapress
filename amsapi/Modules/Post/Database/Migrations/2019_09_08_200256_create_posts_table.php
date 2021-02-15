<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shoulder')->nullable();
            $table->string('headline')->nullable();
            $table->string('hanger')->nullable();
            $table->integer('author_id')->unsigned()->nullable();
            $table->integer('reporter_id')->unsigned()->nullable();
            $table->integer('featured_image_id')->unsigned()->nullable();
            $table->integer('featured_video_id')->unsigned()->nullable();
            $table->integer('video_position')->nullable();
            $table->timestamp('share_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('status')->nullable();
            $table->string('Instant_article')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
