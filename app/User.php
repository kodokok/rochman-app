<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use App\Departemen;
use App\KompetensiAuditor;
use App\AuditPlan;
use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['tanggal_masuk'];

    public function getTanggalMasukAttribute($value)
    {
        // dd($value);
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function getMasaKerja()
    {
        return Carbon::parse($this->tanggal_masuk)->age;
    }

    /**
     * Delete the post image from database
     *
     * @return void
     */
    public function deleteFoto()
    {
        Storage::delete($this->foto);
    }

    public function departemen()
    {
        return $this->hasMany(Departemen::class, 'kadept_user_id');
    }

    public function kompetensi_auditors()
    {
        return $this->hasMany(KompetensiAuditor::class);
    }

    public function auditees()
    {
        return $this->hasMany(AuditPlan::class, 'auditee_id');
    }

    public function auditors()
    {
        return $this->hasMany(AuditPlan::class, 'auditor_id');
    }

    public function auditorLeaders()
    {
        return $this->hasMany(AuditPlan::class, 'auditor_leader_id');
    }
}
