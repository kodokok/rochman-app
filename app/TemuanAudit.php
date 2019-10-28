<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditPlan;
use Carbon\Carbon;

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

    public function getTanggalPerbaikanPencegahanAttribute($value)
    {
        return !empty($value) ? Carbon::parse($value)->format('m-d-Y') : null;
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
