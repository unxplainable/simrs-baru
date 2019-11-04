<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pasien')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->dateTime('tanggal_masuk');
            $table->dateTime('tanggal_keluar');
            $table->bigInteger('id_ruang')->unsigned();
            $table->bigInteger('id_pemeriksaan')->unsigned();
            $table->bigInteger('id_pemeriksaanharian')->unsigned();
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
        Schema::dropIfExists('rawat_inap');
    }
}
