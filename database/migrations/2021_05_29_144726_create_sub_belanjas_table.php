<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBelanjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_belanjas', function (Blueprint $table) {
            $table->increments('id_sub');
            $table->string('sub_belanja',100);
            $table->char('norek_sub',150);
            $table->unsignedInteger('id_induk');
            $table->foreign('id_induk')
                ->references('id_induk')->on('induk_belanjas')
                ->onDelete('cascade');
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
        Schema::dropIfExists('sub_belanjas');
    }
}
