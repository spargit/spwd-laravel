<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixSkillsetId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skill', function (Blueprint $table) {
            $table->renameColumn('sid', 'skillset_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill', function (Blueprint $table) {
            $table->renameColumn('skillset_id', 'sid');
        });
    }
}
