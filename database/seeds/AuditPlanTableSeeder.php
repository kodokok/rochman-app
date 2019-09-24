<?php

use App\AuditPlan;
use App\User;
use Illuminate\Database\Seeder;

class AuditPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auditee = User::findOrFail(2);
        $auditor = User::findOrFail(3);
        $auditor_leader = User::findOrFail(4);
        AuditPlan::create([
            'objektif_audit' => 'Review SOP',
            'klausul' => 'ISO 1009',
            'departement_id' => 1,
            'konfirmasi_kadept' => 0,
            'auditee' => $auditee->id,
            'auditor' => $auditor->id,
            'auditor_leader' => $auditor_leader->id,
            'tanggal' => date('Y-m-d'),
            'waktu' => time(),
        ]);
    }
}
