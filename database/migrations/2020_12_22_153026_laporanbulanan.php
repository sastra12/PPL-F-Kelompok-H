<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Laporanbulanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporanbulanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_proses');
            $table->integer('pemasukan');
            $table->string('keteranganpemasukan');
            $table->integer('pengeluaran');
            $table->string('keteranganpengeluaran');
            $table->integer('keuntungan');
            $table->string('fotobukti');
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
    }
}
