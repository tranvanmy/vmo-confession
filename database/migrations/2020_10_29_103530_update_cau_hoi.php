<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCauHoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cauhoi', function (Blueprint $table){
            $table->integer('luot_danh_gia')->unsigned()->nullable();
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cauhoi', function (Blueprint $table){
            $table->dropColumn('luot_danh_gia');
        });
    }
}
