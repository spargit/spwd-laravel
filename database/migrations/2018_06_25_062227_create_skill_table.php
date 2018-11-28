<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sid');
            $table->string('name', 225);
            $table->string('type', 255);
            $table->boolean('development')->default(true);
            $table->boolean('production')->default(false);
            $table->timestamps();
            $table->foreign('sid')->references('id')->on('skillset');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill');
    }
}
