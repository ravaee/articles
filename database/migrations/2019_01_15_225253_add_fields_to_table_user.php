<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('firstname')->default(null)->nullable();
            $table->string('lastname')->default(null)->nullable();
            $table->text('likes')->default(null)->nullable();
            $table->string('job')->default(null)->nullable();
            $table->text('bio')->default(null)->nullable();
            $table->string('from')->default(null)->nullable();
            $table->integer('gender')->default(null)->nullable();

            $table->boolean('allow_talk')->default(true)->nullable();
            $table->boolean('profile_diasble')->default(false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
