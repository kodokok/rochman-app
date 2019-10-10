<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditPlanKlausul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_plan_klausul', function (Blueprint $table) {
            $table->unsignedInteger('audit_plan_id');
            $table->unsignedInteger('klausul_id');
            $table->timestamps();

            $table->foreign('audit_plan_id')->references('id')->on('audit_plan')->onDelete('cascade');
            $table->foreign('klausul_id')->references('id')->on('klausul')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_plan_klausul');
    }
}
