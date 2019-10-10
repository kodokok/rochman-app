<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kadept_user_id');
            $table->string('kode', 10);
            $table->string('nama', 50);
            $table->string('lokasi', 50)->nullable();
            $table->timestamps();

            $table->foreign('kadept_user_id')
                ->references('id')->on('user')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departemen');
    }
}
