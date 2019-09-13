<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldDeskripsiToTablePageFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('page_files', function (Blueprint $table) {
            //
            $table->text('deskripsi')->after('file');
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
        Schema::table('page_files', function (Blueprint $table) {
            //
            $table->text('deskripsi')->after('file');
        });
    }
}
