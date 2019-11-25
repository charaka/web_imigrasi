<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldUrlTableSlideshow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('slide_shows', function (Blueprint $table) {
            //
            $table->string('url',255)->after('status_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('slide_shows', function (Blueprint $table) {
            //
            $table->string('url',255)->after('status_id')->nullable();
        });
    }
}
