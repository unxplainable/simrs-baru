<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_inap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_petugas')->unsigned();
            $table->bigInteger('id_rawat_inap')->unsigned();
            $table->string('status_pembayaran')->default('0');
            $table->string('total_pembayaran');
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
        Schema::dropIfExists('transaksi_inap');
    }
}
