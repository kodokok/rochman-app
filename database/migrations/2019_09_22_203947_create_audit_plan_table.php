<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_plan', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('objektif_audit')->nullable();
            $table->string('klausul')->nullable();
            $table->unsignedBigInteger('departement');
            $table->unsignedTinyInteger('konfirmasi_kadept')->nullable();
            $table->text('konfirmasi_info')->nullable();
            $table->unsignedBigInteger('auditee');
            $table->unsignedBigInteger('auditor');
            $table->unsignedBigInteger('lead_auditor');
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
        Schema::dropIfExists('audit_plan');
    }
}
