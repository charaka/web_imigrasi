<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldIconToKategoriPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('kategori_pages', function (Blueprint $table) {
            //
            $table->string('icon',255)->after('sort');
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
        Schema::table('kategori_pages', function (Blueprint $table) {
            //
            $table->string('icon',255)->after('sort');
        });
    }
}
