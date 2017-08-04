<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('agenda', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->integer('proyek_id')->unsigned();
        $table->string('kegiatan');
        $table->dateTime('jam_mulai');
        $table->dateTime('jam_selesai');
        $table->string('keterangan');

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
