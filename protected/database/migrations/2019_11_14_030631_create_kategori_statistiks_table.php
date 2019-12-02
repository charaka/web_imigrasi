<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriStatistiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_statistiks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori_in', 255)->nullable();
            $table->string('kategori_en', 255)->nullable();
            $table->string('slug_in', 255)->nullable();
            $table->string('slug_en', 255)->nullable();
            $table->integer('parent')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('kategori_statistiks');
    }
}