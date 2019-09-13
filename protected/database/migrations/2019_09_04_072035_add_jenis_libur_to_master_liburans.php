<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJenisLiburToMasterLiburans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('master_liburans', function (Blueprint $table) {
            //
            $table->integer('jenis_libur')->after('nama_libur');
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
        Schema::table('master_liburans', function (Blueprint $table) {
            //
            $table->integer('jenis_libur')->after('nama_libur');
        });
    }
}
