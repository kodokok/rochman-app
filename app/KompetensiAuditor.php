<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class KompetensiAuditor extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'tanggal_pelatihan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTanggalPelatihanAttribute($value)
    {
        $data = $value ? Carbon::parse($value)->format('d/m/Y') : null;
        return $data;
    }
}
