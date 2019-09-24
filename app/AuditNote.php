<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\AuditPlan;

class AuditNote extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auditPlan()
    {
        return $this->belongsTo(AuditPlan::class);
    }
}
