<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditPlan;

class Klausul extends Model
{
    protected $table = 'klausul';
    protected $guarded = [];

    public function auditPlans()
    {
        return $this->belongsToMany(AuditPlan::class, 'audit_plan_klausul', 'klausul_id', 'audit_plan_id');
    }
}
