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
            $table->string('ketidaksesuaian');
            $table->string('akar_masalah');
            $table->string('tindakan_perbaikan');
            $table->string('tindakan_pencegahan');
            $table->string('review');
            $table->unsignedBigInteger('audit_plan');
            $table->dateTime('approve_kadept');
            $table->dateTime('approve_auditee');
            $table->dateTime('approve_auditor');
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
