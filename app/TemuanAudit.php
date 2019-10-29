<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditPlan;
use Carbon\Carbon;

class TemuanAudit extends Model
{
    protected $table = 'temuan_audit';
    protected $guarded = [];

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

    public function isCompleted()
    {
        if ($this->approval_kadept != 0 && $this->approval_auditee != 0 && $this->approval_auditor != 0 && $this->approval_auditor_lead != 0) {
            return true;
        }
        return false;
    }

    public function isClosed()
    {
        if ($this->status == 'Closed'){
            return true;
        }
        return false;
    }
}
