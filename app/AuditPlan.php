<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departement;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class AuditPlan extends Model
{
    protected $guarded = [];
    protected $dates = ['tanggal'];
    protected $times = ['waktu'];
    protected $approvalStatus = ['pending', 'reschedule', 'approve', 'reject'];

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

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function auditee()
    {
        return $this->belongsTo(User::class);
    }

    public function auditor()
    {
        return $this->belongsTo(User::class);
    }

    public function auditorLeader()
    {
        return $this->belongsTo(User::class);
    }
}
