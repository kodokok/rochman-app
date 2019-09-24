<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_plans', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('objektif_audit')->nullable();
            $table->string('klausul')->nullable();
            $table->unsignedBigInteger('departement_id');
            $table->unsignedTinyInteger('konfirmasi_kadept')->nullable();
            $table->unsignedBigInteger('auditee');
            $table->unsignedBigInteger('auditor');
            $table->unsignedBigInteger('auditor_leader');
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
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
        Schema::dropIfExists('audit_plans');
    }
}
