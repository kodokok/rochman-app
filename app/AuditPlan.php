<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuditNote;

class AuditPlan extends Model
{
    protected $guarded = [];

    public function auditNotes()
    {
        return $this->hasMany(AuditNote::class);
    }
}
