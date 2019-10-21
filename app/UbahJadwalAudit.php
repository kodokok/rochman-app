<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UbahJadwalAudit extends Model
{
    protected $table = 'ubah_jadwal_audit';
    protected $guarded = [];

    public function getTanggalAttribute($value)
    {
        // dd($value);
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function getWaktuAttribute($value)
    {
        // dd($value);
        return Carbon::parse($value)->format('H:i:s');
    }

    public function auditplan()
    {
        return $this->belongsTo(AuditPlan::class);
    }
}
