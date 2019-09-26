<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemuanAuditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temuan_audit', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('audit_plan');
            $table->unsignedTinyInteger('status');
            $table->string('ketidaksesuaian')->nullable();
            $table->string('akar_masalah')->nullable();
            $table->string('tindakan_perbaikan')->nullable();
            $table->string('tindakan_pencegahan')->nullable();
            $table->string('review')->nullable();
            $table->dateTime('approve_kadept')->nullable();
            $table->dateTime('approve_auditee')->nullable();
            $table->dateTime('approve_auditor')->nullable();
            $table->dateTime('approve_auditor_lead');
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
        Schema::dropIfExists('temuan_audit');
    }
}
