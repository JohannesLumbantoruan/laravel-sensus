<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->increments('warga_id');
            $table->string('warga_nama');
            $table->bigInteger('warga_ktp');
            $table->string('warga_jk');
            $table->integer('warga_desa');
            $table->integer('warga_dusun');
            $table->string('warga_rt');
            $table->string('warga_rw');
            $table->string('warga_status');
            $table->string('warga_pendidikan');
            $table->string('warga_agama');
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
        Schema::dropIfExists('warga');
    }
}
