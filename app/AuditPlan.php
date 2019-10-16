<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departement;
use App\User;
use App\TemuanAudit;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Klausul;

class AuditPlan extends Model
{
    protected $table = 'audit_plan';
    protected $guarded = [];
    protected $dates = ['tanggal'];
    protected $times = ['waktu'];
    protected $approvalStatus = ['open', 'pending', 'approve', 'reject'];

    public function getApprovalAttribute($value)
    {
        return Arr::get($this->approvalStatus, $value);
    }

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

    public function getSchedule()
    {
        return new Carbon($this->attributes['tanggal'] . ' ' . $this->attributes['waktu']);
    }

    public function klausuls()
    {
        return $this->belongsToMany(Klausul::class, 'audit_plan_klausul', 'audit_plan_id', 'klausul_id')->withTimestamps();
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function auditee()
    {
        return $this->belongsTo(User::class, 'auditee_user_id');
    }

    public function auditor()
    {
        return $this->belongsTo(User::class, 'auditor_user_id');
    }

    public function auditorLead()
    {
        return $this->belongsTo(User::class, 'auditor_lead_user_id');
    }

    public function temuanAudits()
    {
        return $this->hasMany(TemuanAudit::class, 'audit_plan_id');
    }

    public function ubahJadwalAudit()
    {
        return $this->hasOne(UbahJadwalAudit::class, 'audit_plan_id');
    }
}
