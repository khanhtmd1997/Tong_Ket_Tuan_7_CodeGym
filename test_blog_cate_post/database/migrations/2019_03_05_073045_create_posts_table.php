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
            $table->timestamps();
            $table->string("title");
            $table->string("summary");
            $table->string('content');
            $table->string('picture');
            $table->string('category_id');
        });
  //               Schema::table('posts', function (Blueprint $table) {
  //     $table->unsignedInteger('category_id')->after('picture')->nullable();
  //     $table->foreign('category_id')->references('id')->on('categories');
  // });
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
