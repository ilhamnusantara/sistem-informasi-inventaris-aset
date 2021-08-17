<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekanans', function (Blueprint $table) {
            $table->increments('id_rekanan');
            $table->string('nama_rekanan');
            $table->string('alamat');
            $table->string('nama_pimpinan');
            $table->string('no_rek');
            $table->string('no_telp');
            $table->string('no_npwp')->nullable();
            $table->string('no_siup')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('rekanans');
    }
}
