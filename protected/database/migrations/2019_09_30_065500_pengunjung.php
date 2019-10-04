<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengunjung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pengunjungs', function (Blueprint $table) {
            $table->string('user_agent',255);
            $table->string('ip',255);
            $table->tinyInteger('is_desktop',4);
            $table->string('browser_name',255);
            $table->string('platform',255);
            $table->string('tgl_kunjungan',255);
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
        //
        Schema::dropIfExists('pengunjungs');
    }
}
