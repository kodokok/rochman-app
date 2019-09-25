<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departement;
use App\User;
use Carbon\Carbon;

class AuditPlan extends Model
{
    protected $guarded = [];
    protected $dates = ['tanggal'];
    protected $times = ['waktu'];

    public function getTanggalAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function getWaktuAttribute($value)
    {
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
