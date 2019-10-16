<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbahJadwalAudit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubah_jadwal_audit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('audit_plan_id')->index();
            $table->date('tanggal');
            $table->time('waktu');
            $table->text('catatan', 255)->nullable();
            $table->timestamps();

            $table->foreign('audit_plan_id')
                ->references('id')->on('audit_plan')
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
        Schema::dropIfExists('ubah_jadwal_audit');
    }
}
