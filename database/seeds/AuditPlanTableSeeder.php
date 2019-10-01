<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Departemen;
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
        $auditor = User::role('auditor')->pluck('id');
        $auditor_lead = User::role('auditor_lead')->pluck('id');
        $klausuls = Klausul::all();

        for ($i=0; $i < 20; $i++) {
            AuditPlan::create([
                'departement_id' => Departemen::all()->random()->id,
                'approval_kadept' => $faker->numberBetween(0, 1),
                'tanggal' => $faker->date('Y-m-d', 'now'),
                'waktu' => $faker->time('H:i:s','now'),
                'auditee_user_id' => User::all()->random()->id,
                'auditor_user_id' => $auditor ? $faker->randomElement($auditor) : $faker->randomElement($auditor),
                'auditor_lead_user_id' => $faker->randomElement($auditor_lead),
                'catatan' => $faker->realText(255, 2),
            ]);
        }

        AuditPlan::all()->each(function ($auditplan) use ($klausuls){
            $auditplan->klausuls()->attach(
                $klausuls->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
