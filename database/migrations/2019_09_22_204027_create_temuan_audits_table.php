<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemuanAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temuan_audits', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('audit_plan_id');
            $table->unsignedTinyInteger('status')->default(0);
            $table->string('ketidaksesuaian');
            $table->string('akar_masalah');
            $table->string('tindakan_perbaikan');
            $table->date('duedate_perbaikan');
            $table->string('tindakan_pencegahan');
            $table->date('duedate_pencegahan');
            $table->text('review')->nullable();
            $table->unsignedTinyInteger('approve_kadept')->default(0);
            $table->unsignedTinyInteger('approve_auditee')->default(0);
            $table->unsignedTinyInteger('approve_auditor')->default(0);
            $table->unsignedTinyInteger('approve_auditor_leader')->default(0);
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
        Schema::dropIfExists('temuan_audits');
    }
}
