<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditPlan;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class TemuanAudit extends Model
{
    protected $table = 'temuan_audit';
    protected $guarded = [];

    protected $casts = [
        'approval_kadept' => 'boolean',
        'approval_auditee' => 'boolean',
        'approval_auditor' => 'boolean',
        'approval_auditor_lead' => 'boolean',
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

    public function auditplan()
    {
        return $this->belongsTo(AuditPlan::class, 'audit_plan_id');
    }

    public function klausul()
    {
        return $this->belongsTo(Klausul::class, 'klausul_id');
    }
}
