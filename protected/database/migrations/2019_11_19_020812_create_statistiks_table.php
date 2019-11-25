<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatistiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistiks', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('bulan')->nullable();
            $table->year('tahun')->nullable();
            $table->integer('kategori')->nullable();
            $table->integer('jumlah')->nullable();
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
        Schema::dropIfExists('statistiks');
    }
}
