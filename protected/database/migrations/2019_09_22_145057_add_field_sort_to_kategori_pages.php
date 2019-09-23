<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldSortToKategoriPages extends Migration
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
            $table->text('sort')->after('slug_en');
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
            $table->text('sort')->after('slug_en');
        });
    }
}
