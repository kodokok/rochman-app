<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditPlan;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class TemuanAudit extends Model
{
    protected $guarded = [];

    protected $casts = [
        'approve_kadept' => 'boolean',
        'approve_auditee' => 'boolean',
        'approve_auditor' => 'boolean',
        'approve_auditor_leader' => 'boolean',
        'status' => 'boolean'
    ];

    public function getStatusAttribute($value)
    {
        return $value ? 'Closed' : 'Open';
    }

    public function getDuedatePerbaikanAttribute($value)
    {
        // dd($value);
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function getDuedatePencegahanAttribute($value)
    {
        // dd($value);
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function audit_plan()
    {
        return $this->belongsTo(AuditPlan::class);
    }
}
