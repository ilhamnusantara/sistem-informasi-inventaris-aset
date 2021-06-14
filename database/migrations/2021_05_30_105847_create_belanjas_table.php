<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanjas', function (Blueprint $table) {
            $table->increments('id_belanja');
            $table->integer('id_dokumen');
            $table->string('no_pbb_ls');
            $table->string('rekanan');
            $table->integer('nominal_belanja');
            $table->date('tanggal_belanja');
            $table->string('sp2d');
            $table->date('tanggal_sp2d');
            $table->string('status');
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
        Schema::dropIfExists('belanjas');
    }
}