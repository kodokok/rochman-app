<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\AuditPlan;

class Departement extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auditPlans()
    {
        return $this->hasMany(AuditPlan::class);
    }
}
