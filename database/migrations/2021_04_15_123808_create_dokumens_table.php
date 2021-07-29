<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->increments('id_dokumen');
            $table->unsignedInteger('id_jenis')->foreign('id_jenis')->references('id_jenis')->on('jenisBelanjas')->onDelete('cascade');
            $table->unsignedInteger('id_instansi')->foreign('id_instansi')->references('id_instansi')->on('instansi')->onDelete('cascade');
            $table->string('keterangan_belanja');
            $table->string('rincian_belanja')->nullable();
            $table->string('no_spk')->nullable();
            $table->date('tgl_spk')->nullable();
            $table->string('file_spk')->nullable();
            $table->string('no_bast')->nullable();
            $table->date('tgl_bast')->nullable();
            $table->string('file_bast')->nullable();
            $table->string('merk')->nullable();
            $table->string('bahan')->nullable();
            $table->string('type')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('foto')->nullable();
            $table->string('status')->nullable();
            $table->string('status_belanja')->nullable();
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
        Schema::dropIfExists('dokumens');
    }
}
