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
            $table->string('ketidaksesuaian');
            $table->string('akar_masalah');
            $table->string('tindakan_perbaikan');
            $table->date('duedate_perbaikan');
            $table->string('tindakan_pencegahan');
            $table->date('duedate_pencegahan');
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
