<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditPlan;

class TemuanAudit extends Model
{
    protected $guarded = [];

    public function auditplan()
    {
        return $this->belongsTo(AuditPlan::class);
    }
}
