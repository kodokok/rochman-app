<?php

use App\AuditPlan;
use App\Departement;
use App\User;
use Illuminate\Database\Seeder;

class AuditPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::findOrFail(1);
        $auditee = User::findOrFail(2);
        $auditor = User::findOrFail(3);
        $auditor_leader = User::findOrFail(4);
        $dept1 = Departement::findOrFail(1);
        $dept2 = Departement::findOrFail(2);
        $dept3 = Departement::findOrFail(3);

        AuditPlan::create([
            'objektif_audit' => 'Review SOP ' . $dept1->name,
            'klausul' => 'ISO 1009',
            'departement_id' => $dept1->id,
            'konfirmasi_kadept' => 1,
            'auditee_id' => $admin->id,
            'auditor_id' => $auditor->id,
            'auditor_leader_id' => $auditor_leader->id,
            'tanggal' => date('Y-m-d'),
            'waktu' => date('H:i:s'),
        ]);
        AuditPlan::create([
            'objektif_audit' => 'Review SOP ' . $dept2->name,
            'klausul' => 'ISO 1009',
            'departement_id' => $dept2->id,
            'konfirmasi_kadept' => 0,
            'auditee_id' => $auditee->id,
            'auditor_id' => $auditor->id,
            'auditor_leader_id' => $auditor_leader->id,
            'tanggal' => date('Y-m-d'),
            'waktu' => date('H:i:s'),
        ]);
        AuditPlan::create([
            'objektif_audit' => 'Review SOP ' . $dept3->name,
            'klausul' => 'ISO 1009',
            'departement_id' => $dept3->id,
            'konfirmasi_kadept' => 0,
            'auditee_id' => $auditee->id,
            'auditor_id' => $auditor->id,
            'auditor_leader_id' => $auditor_leader->id,
            'tanggal' => date('Y-m-d'),
            'waktu' => date('H:i:s'),
        ]);
        AuditPlan::create([
            'objektif_audit' => 'Review SOP ' . $dept3->name,
            'klausul' => 'ISO 1009',
            'departement_id' => $dept3->id,
            'konfirmasi_kadept' => 0,
            'auditee_id' => $auditee->id,
            'auditor_id' => $admin->id,
            'auditor_leader_id' => $auditor_leader->id,
            'tanggal' => date('Y-m-d'),
            'waktu' => date('H:i:s'),
        ]);
    }
}
