<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeriksaanHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan_harian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tindakan')->unsigned();
            $table->bigInteger('id_pasien')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->dateTime('tanggal_periksa_harian');
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
        Schema::dropIfExists('pemeriksaan_harian');
    }
}
