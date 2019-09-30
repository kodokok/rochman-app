<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nama', 50);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('alamat', 100)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('pendidikan', 20)->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('foto', 100)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
