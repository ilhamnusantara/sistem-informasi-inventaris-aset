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
            $table->string('instansi')->nullable();
            $table->string('satuan');
            $table->integer('volume');
            $table->integer('nominal_belanja');
            $table->integer('total_belanja');
            $table->unsignedInteger('id_rekanan')->foreign('id_rekanan')->references('id_rekanan')->on('instansis')->onDelete('cascade');
            $table->string('no_pbb_ls');
            $table->date('tanggal_belanja');
            $table->string('sp2d')->nullable();
            $table->date('tanggal_sp2d')->nullable();
            $table->integer('nilai_sp2d')->nullable();
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
