<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artis', function (Blueprint $table) {
            $table->string('kd_artis')->primary();
            $table->string('nm_artis');
            $table->string('jk');
            $table->integer('bayaran');
            $table->integer('award');
            $table->string('negara');
            $table->foreign('negara')->references('kd_negara')->on('negara');
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
        Schema::dropIfExists('artis');
    }
}
