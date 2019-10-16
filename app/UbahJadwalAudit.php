<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UbahJadwalAudit extends Model
{
    protected $table = 'ubah_jadwal_audit';
    protected $guarded = [];

    public function auditplan()
    {
        return $this->belongsTo(AuditPlan::class);
    }
}
