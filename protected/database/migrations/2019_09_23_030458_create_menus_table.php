<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_in',255);
            $table->string('menu_en',255);
            $table->string('model',255);
            $table->string('slug_in',255);
            $table->string('slug_en',255);
            $table->integer('id_element');
            $table->string('parent_id',255);
            $table->string('url',255);
            $table->tinyInteger('depth');
            $table->tinyInteger('sort');
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
        Schema::dropIfExists('menus');
    }
}
