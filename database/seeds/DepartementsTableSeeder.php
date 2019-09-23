<?php

use App\User;
Use App\Departement;
use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1);
        $user2 = User::findOrFail(2);

        Departement::create(['name' => 'QA', 'lokasi' => 'office', 'user_id' => $user->id]);
        Departement::create(['name' => 'IT', 'lokasi' => 'office', 'user_id' => $user->id]);
        Departement::create(['name' => 'MS', 'lokasi' => 'office', 'user_id' => $user2->id]);
        Departement::create(['name' => 'HR', 'lokasi' => 'office', 'user_id' => $user2->id]);
        Departement::create(['name' => 'PRODUCTION', 'lokasi' => 'office', 'user_id' => $user2->id]);
    }
}
