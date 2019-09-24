<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departement;
use App\User;

class AuditPlan extends Model
{
    protected $guarded = [];
    protected $dates = ['tanggal'];
    protected $times = ['waktu'];

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
