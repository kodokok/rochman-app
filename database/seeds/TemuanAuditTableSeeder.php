<?php

use App\TemuanAudit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TemuanAuditTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TemuanAudit::create([
            'audit_plan_id' => 1,
            'status' => 0,
            'ketidaksesuaian' => 'auditplan 1, ini tidak sesuai ini pertama',
            'akar_masalah' => 'auditplan 1, ini akar masalah pertama',
            'tindakan_perbaikan' => 'auditplan 1, tindakan perbaikan pertama',
            'duedate_perbaikan' => Carbon::now()->addDay(1),
            'tindakan_pencegahan' => 'auditplan 1, tindakan penceganan pertama',
            'duedate_pencegahan' => Carbon::now()->addDay(2),
            'approve_dept' => 0,
            'approve_auditee' => 0,
            'approve_auditor' => 0,
            'approve_auditor_lead' => 0,
        ]);
        TemuanAudit::create([
            'audit_plan_id' => 1,
            'status' => 1,
            'ketidaksesuaian' => 'auditplan 1, ini tidak sesuai ini kedua',
            'akar_masalah' => 'auditplan 1, ini akar masalah kedua',
            'tindakan_perbaikan' => 'auditplan 1,tindakan perbaikan kedua',
            'duedate_perbaikan' => Carbon::now()->addDay(1),
            'tindakan_pencegahan' => 'auditplan 1,tindakan penceganan kedua',
            'duedate_pencegahan' => Carbon::now()->addDay(2),
            'approve_dept' => 1,
            'approve_auditee' => 1,
            'approve_auditor' => 1,
            'approve_auditor_lead' => 1,
        ]);

        TemuanAudit::create([
            'audit_plan_id' => 2,
            'status' => 1,
            'ketidaksesuaian' => 'auditplan 2,ini tidak sesuai ini pertama',
            'akar_masalah' => 'auditplan 2,ini akar masalah pertama',
            'tindakan_perbaikan' => 'auditplan 2,tindakan perbaikan pertama',
            'duedate_perbaikan' => Carbon::now()->addDay(2),
            'tindakan_pencegahan' => 'auditplan 2,tindakan penceganan pertama',
            'duedate_pencegahan' => Carbon::now()->addDay(3),
            'approve_dept' => 1,
            'approve_auditee' => 1,
            'approve_auditor' => 0,
            'approve_auditor_lead' => 0,
        ]);
        TemuanAudit::create([
            'audit_plan_id' => 2,
            'status' => 0,
            'ketidaksesuaian' => 'auditplan 2,ini tidak sesuai ini kedua',
            'akar_masalah' => 'auditplan 2,ini akar masalah pertama',
            'tindakan_perbaikan' => 'auditplan 2,tindakan perbaikan kedua',
            'duedate_perbaikan' => Carbon::now()->addDay(4),
            'tindakan_pencegahan' => 'auditplan 2,tindakan penceganan kedua',
            'duedate_pencegahan' => Carbon::now()->addDay(5),
            'approve_dept' => 0,
            'approve_auditee' => 0,
            'approve_auditor' => 0,
            'approve_auditor_lead' => 0,
        ]);
    }
}
