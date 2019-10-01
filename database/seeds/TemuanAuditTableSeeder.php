<?php

use App\AuditPlan;
use Illuminate\Database\Seeder;
use App\TemuanAudit;
use Carbon\Carbon;
use Faker\Factory as Faker;

class TemuanAuditTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $auditplans = AuditPlan::where('approval_kadept', 1)->get();

        for ($i=0; $i < 20; $i++) {
            TemuanAudit::create([
                'audit_plan_id' => $auditplans->random()->id,
                'status' => rand(0,1),
                'klasifikasi_temuan' => rand(0,1),
                'ketidaksesuaian' => $faker->realText(100, 2),
                'akar_masalah' => $faker->realText(100, 2),
                'tindakan_perbaikan_pencegahan' => $faker->realText(100, 2),
                'tanggal_perbaikan_pencegahan' => Carbon::now()->addDay(rand(10, 30)),
                'approval_kadept' => rand(0,1),
                'approval_auditee' => rand(0,1),
                'approval_auditor' => rand(0,1),
                'approval_auditor_lead' => rand(0,1),
                'review' => $faker->realText(255, 2),
            ]);
        }
    }
}
