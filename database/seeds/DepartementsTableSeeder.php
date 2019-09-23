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

        Departement::create(['nama' => 'QA', 'lokasi' => 'office', 'kadept' => $user->id]);
        Departement::create(['nama' => 'IT', 'lokasi' => 'office', 'kadept' => $user->id]);
        Departement::create(['nama' => 'MS', 'lokasi' => 'office', 'kadept' => $user2->id]);
        Departement::create(['nama' => 'HR', 'lokasi' => 'office', 'kadept' => $user2->id]);
        Departement::create(['nama' => 'PRODUCTION', 'lokasi' => 'office', 'kadept' => $user2->id]);
    }
}
