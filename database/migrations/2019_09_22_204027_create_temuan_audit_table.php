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
            $table->unsignedBigInteger('auditplan_id');
            $table->unsignedTinyInteger('status')->default(0);
            $table->string('ketidaksesuaian')->nullable();
            $table->string('akar_masalah')->nullable();
            $table->string('tindakan_perbaikan')->nullable();
            $table->string('tindakan_pencegahan')->nullable();
            $table->text('review')->nullable();
            $table->unsignedTinyInteger('approve_dept')->default(0);
            $table->unsignedTinyInteger('approve_auditee')->default(0);
            $table->unsignedTinyInteger('approve_auditor')->default(0);
            $table->unsignedTinyInteger('approve_auditor_lead')->default(0);
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
