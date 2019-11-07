<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawatJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_jalan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pasien')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->dateTime('tanggal_keluar')->nullable();
            $table->dateTime('tanggal_masuk')->nullable();
            $table->bigInteger('id_pemeriksaan')->unsigned();
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
        Schema::dropIfExists('rawat_jalan');
    }
}
