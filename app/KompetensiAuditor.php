<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class KompetensiAuditor extends Model
{
    protected $table = 'kompetensi_auditor';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
