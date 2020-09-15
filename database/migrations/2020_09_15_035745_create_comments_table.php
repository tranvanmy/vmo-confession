<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_post')->unsigned();
            $table->text('body');
            $table->integer('id_parent')->unsigned();
            $table->foreign('id_parent')
                    ->references('id')
                    ->on('comments')
                    ->onDelete('cascade');
            $table->foreign('id_post')
                    ->references('id')
                    ->on('posts')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
