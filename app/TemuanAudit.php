<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditPlan;
use Illuminate\Support\Arr;

class TemuanAudit extends Model
{
    protected $guarded = [];

    protected $statusList = ['tindakan', 'perbaikan', 'pencegahan', 'selesai'];

    public function getStatusAttribute($value)
    {
        return Arr::get($this->statusList, $value);
    }

    public function auditplan()
    {
        return $this->belongsTo(AuditPlan::class);
    }
}
