<?php

use App\KompetensiAuditor;
use App\User;
use Illuminate\Database\Seeder;

class KomptensiAuditorTableSeeder extends Seeder
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

        KompetensiAuditor::create(['user_id' => $user->id, '']);
    }
}
