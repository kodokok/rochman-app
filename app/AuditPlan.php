<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departement;

class AuditPlan extends Model
{
    protected $guarded = [];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
