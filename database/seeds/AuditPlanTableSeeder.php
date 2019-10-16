<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Departemen;
use App\AuditPlan;
use App\Klausul;
use App\UbahJadwalAudit;
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
        $auditor = User::role('auditor')->pluck('id');
        $auditor_lead = User::role('auditor_lead')->pluck('id');
        $klausuls = Klausul::all();

        for ($i=0; $i < 20; $i++) {
            $auditplan = AuditPlan::create([
                'departemen_id' => Departemen::all()->random()->id,
                'approval_kadept' => $faker->numberBetween(0, 1),
                'tanggal' => $faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d'),
                'waktu' => $faker->time('H:i:s','now'),
                'auditee_user_id' => User::all()->random()->id,
                'auditor_user_id' => $auditor ? $faker->randomElement($auditor) : $faker->randomElement($auditor),
                'auditor_lead_user_id' => $faker->randomElement($auditor_lead),
            ]);

            $auditplan->klausuls()->attach(
                $klausuls->random(rand(1, 4))->pluck('id')->toArray()
            );

            if (($i % 2) == 0) {
                if (!$auditplan->approval_kadept) {
                    $ubahJadwal = new UbahJadwalAudit([
                        'tanggal' => $faker->dateTimeBetween('+1 week', '+2 month')->format('Y-m-d'),
                        'waktu' => $faker->time('H:i:s','now'),
                        'catatan' => $faker->realText(200, 2),
                    ]);

                    $auditplan->UbahJadwalAudit()->save($ubahJadwal);
                }
            }
        }

    }
}
