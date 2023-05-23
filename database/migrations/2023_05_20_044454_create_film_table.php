<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->string('kd_film',10)->primary();
            $table->string('nm_film',55);
            $table->string('genre');
            $table->foreign('genre')->references('kd_genre')->on('genre');
            $table->string('artis');
            $table->foreign('artis')->references('kd_artis')->on('artis');
            $table->string('produser');
            $table->foreign('produser')->references('kd_produser')->on('produser');
            $table->integer('pendapatan');
            $table->integer('nominasi');
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
        Schema::dropIfExists('film');
    }
}
