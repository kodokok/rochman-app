<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditPlan;

class Klausul extends Model
{
    protected $table = 'klausul';
    protected $guarded = [];

    public function auditplans()
    {
        return $this->belongsToMany(AuditPlan::class, 'audit_plan_klausul', 'audit_plan_id', 'klausul_id');
    }
}
