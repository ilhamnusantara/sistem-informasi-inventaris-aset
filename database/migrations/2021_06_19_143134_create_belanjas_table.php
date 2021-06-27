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
            $table->unsignedInteger('id_dokumen')->foreign('id_dokumen')->references('id_dokumen')->on('dokumens')->onDelete('cascade');
            $table->string('satuan');
            $table->integer('volume');
            $table->integer('nominal_belanja');
            $table->string('rekanan');
            $table->string('no_pbb_ls');
            $table->string('tanggal_belanja');
            $table->string('sp2d')->nullable();
            $table->string('tanggal_sp2d')->nullable();
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
