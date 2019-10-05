<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\AuditPlan;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $guarded = [];

    public function kadept()
    {
        return $this->belongsTo(User::class, 'kadept_user_id', 'id');
    }

    public function auditplans()
    {
        return $this->hasMany(AuditPlan::class, 'departement_id');
    }
}
