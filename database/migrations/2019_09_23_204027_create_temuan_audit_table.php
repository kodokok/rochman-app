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
            $table->increments('id')->unsigned();
            $table->unsignedInteger('audit_plan_id')->index();
            $table->unsignedInteger('klausul_id')->index();
            $table->string('ketidaksesuaian', 100);
            $table->string('akar_masalah', 100);
            $table->string('tindakan_perbaikan_pencegahan')->nullable();
            $table->date('tanggal_perbaikan_pencegahan')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedTinyInteger('klasifikasi_temuan')->default(0);
            $table->text('review', 255)->nullable();
            $table->unsignedTinyInteger('approval_kadept')->default(0);
            $table->unsignedTinyInteger('approval_auditee')->default(0);
            $table->unsignedTinyInteger('approval_auditor')->default(0);
            $table->unsignedTinyInteger('approval_auditor_lead')->default(0);
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
