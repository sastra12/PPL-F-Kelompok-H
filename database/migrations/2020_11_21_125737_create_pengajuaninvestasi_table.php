<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuaninvestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuaninvestasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_peternakan');
            $table->integer('nominal');
            $table->string('saratperjanjian');
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
        Schema::dropIfExists('pengajuaninvestasi');
    }
}
