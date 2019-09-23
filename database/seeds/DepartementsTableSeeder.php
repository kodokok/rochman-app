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

        Departement::create(['name' => 'QA', 'lokasi' => 'office', 'kadept' => $user->id]);
        Departement::create(['name' => 'IT', 'lokasi' => 'office', 'kadept' => $user->id]);
        Departement::create(['name' => 'MS', 'lokasi' => 'office', 'kadept' => $user2->id]);
        Departement::create(['name' => 'HR', 'lokasi' => 'office', 'kadept' => $user2->id]);
        Departement::create(['name' => 'PRODUCTION', 'lokasi' => 'office', 'kadept' => $user2->id]);
    }
}
