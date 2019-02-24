<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Article_View', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->default(0);
            $table->integer('article_id')->defualt(0);
            $table->string('ip')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Article_View');
    }
}
