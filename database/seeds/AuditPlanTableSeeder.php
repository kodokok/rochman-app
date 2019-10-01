<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Departement;
use App\AuditPlan;
use App\Klausul;
use Faker\Factory as Faker;

class AuditPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i < 30; $i++) {
            AuditPlan::create([
                // 'departement_id' => Departement::all()->random()->id,
                // 'klausul_id' => Klausul::all()->random()->id,
                // 'approval' => 1,
                // 'auditee_id' => $admin->id,
                // 'auditor_id' => $auditor->id,
                // 'auditor_leader_id' => $auditor_leader->id,
                // 'tanggal' => date('Y-m-d'),
                // 'waktu' => date('H:i:s'),
            ]);
        }
        // $admin = User::findOrFail(1);
        // $auditee = User::findOrFail(2);
        // $auditor = User::findOrFail(3);
        // $auditor_leader = User::findOrFail(4);
        // $dept1 = Departement::findOrFail(1);
        // $dept2 = Departement::findOrFail(2);
        // $dept3 = Departement::findOrFail(3);

        // $data = [
        //     ['objektif_audit_id' => 1, ]
        // ];

        // AuditPlan::create([
        //     'objektif_audit' => 'Review SOP ' . $dept1->name,
        //     'klausul' => 'ISO 1009',
        //     'departement_id' => $dept1->id,
        //     'approval' => 1,
        //     'auditee_id' => $admin->id,
        //     'auditor_id' => $auditor->id,
        //     'auditor_leader_id' => $auditor_leader->id,
        //     'tanggal' => date('Y-m-d'),
        //     'waktu' => date('H:i:s'),
        // ]);
    }
}
