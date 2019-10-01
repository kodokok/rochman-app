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
                'pelatihan' => $faker->sentence(3, true),
                'nilai' => $faker->numberBetween(45, 100),
            ]);
        }
        // $user1 = User::findOrFail(1);
        // $user2 = User::findOrFail(8);
        // $user3 = User::findOrFail(8);

        // $data = [
        //     ['user_id' => $user1->id, 'pelatihan' => 'Pelatihan #1', 'nilai' => 80],
        //     ['user_id' => $user1->id, 'pelatihan' => 'Pelatihan #2', 'nilai' => 70],
        //     ['user_id' => $user1->id, 'pelatihan' => 'Pelatihan #3', 'nilai' => 90],
        //     ['user_id' => $user1->id, 'pelatihan' => 'Pelatihan #4', 'nilai' => 100],
        //     ['user_id' => $user2->id, 'pelatihan' => 'Pelatihan Standarisasi #1', 'nilai' => 100],
        //     ['user_id' => $user2->id, 'pelatihan' => 'Pelatihan Standarisasi #2', 'nilai' => 100],
        //     ['user_id' => $user2->id, 'pelatihan' => 'Pelatihan Standarisasi #3', 'nilai' => 100],
        //     ['user_id' => $user2->id, 'pelatihan' => 'Pelatihan Standarisasi #4', 'nilai' => 100],
        //     ['user_id' => $user3->id, 'pelatihan' => 'Pelatihan Standarisasi #1', 'nilai' => 75],
        //     ['user_id' => $user3->id, 'pelatihan' => 'Pelatihan Standarisasi #2', 'nilai' => 70],
        //     ['user_id' => $user3->id, 'pelatihan' => 'Pelatihan Standarisasi #3', 'nilai' => 90],
        // ];

        // foreach ($data as $ka) {
        //     KompetensiAuditor::create($ka);
        // }
    }
}
