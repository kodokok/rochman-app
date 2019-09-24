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

    public function auditeeUser()
    {
        return $this->belongsTo(User::class);
    }

    public function auditorUser()
    {
        return $this->belongsTo(User::class);
    }

    public function auditorLeaderUser()
    {
        return $this->belongsTo(User::class);
    }
}
