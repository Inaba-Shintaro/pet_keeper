<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pet_holder_id')->unsigned()->index();
            $table->bigInteger('pet_keeper_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('pet_holder_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pet_keeper_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['pet_holder_id', 'pet_keeper_id']);//組み合わせのダブリが起こらない設定 1:2 の組み合わせは1つだけ
            $table->unique(['pet_holder_id', 'pet_keeper_id']);//組み合わせのダブリが起こらない設定 1:2 の組み合わせは1つだけ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
