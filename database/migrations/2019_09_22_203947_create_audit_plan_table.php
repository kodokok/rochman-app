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
            $table->increments('id')->unsigned();
            $table->unsignedInteger('departemen_id');
            $table->unsignedTinyInteger('approval_kadept')->default(0);
            $table->date('tanggal');
            $table->time('waktu');
            $table->unsignedInteger('auditee_user_id');
            $table->unsignedInteger('auditor_user_id');
            $table->unsignedInteger('auditor_lead_user_id');
            $table->timestamps();

            $table->foreign('departemen_id')
                ->references('id')->on('departemen')
                ->onDelete('restrict');
            $table->foreign('auditee_user_id')
                ->references('id')->on('user')
                ->onDelete('restrict');
            $table->foreign('auditor_user_id')
                ->references('id')->on('user')
                ->onDelete('restrict');
            $table->foreign('auditor_lead_user_id')
                ->references('id')->on('user')
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
        Schema::dropIfExists('audit_plan');
    }
}
