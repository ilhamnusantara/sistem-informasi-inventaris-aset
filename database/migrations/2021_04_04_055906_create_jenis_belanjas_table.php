<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisBelanjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_belanjas', function (Blueprint $table) {
            $table->increments('id_jenis');
            $table->string('jenis_belanja',100);
            $table->char('norek_jenis',150);
            $table->string('kategori');
            $table->unsignedInteger('id_sub')->foreign('id_sub')->references('id_sub')->on('subBelanjas')->onDelete('cascade');
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
        Schema::dropIfExists('jenis_belanjas');
    }
}
