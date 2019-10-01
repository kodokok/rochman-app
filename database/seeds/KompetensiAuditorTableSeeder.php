<?php

use Illuminate\Database\Seeder;
use App\User;
use App\KompetensiAuditor;
use Faker\Factory as Faker;

class KompetensiAuditorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $user = User::role(['admin', 'auditor', 'auditor_lead'])->get();

        for ($i=0; $i < 15; $i++) {
            KompetensiAuditor::create([
                'user_id' => $user->random()->id,
                'pelatihan' => $faker->realText(100, 2),
                'nilai' => $faker->numberBetween(45, 100),
            ]);
        }
    }
}
