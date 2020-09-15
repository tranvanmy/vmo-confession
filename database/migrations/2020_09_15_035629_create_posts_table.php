<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->integer('id_category')->unsigned();
            $table->string('title',150)->nullable();
            $table->text('content')->nullable();
            $table->integer('published');
            $table->timestamps('published_at');
            $table->timestamps();
            $table->foreign('id_category')
                    ->references('id')
                    ->on('categorys')
                    ->onDelete('cascade');
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
