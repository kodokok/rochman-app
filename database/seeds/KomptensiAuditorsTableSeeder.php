<?php

use App\KompetensiAuditor;
use App\User;
use Illuminate\Database\Seeder;

class KomptensiAuditorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1);
        KompetensiAuditor::create([
            'user_id' => $user->id,
            'pelatihan' => 'Basic Traning Auditor',
            'tanggal_pelatihan' => date('1999-05-01'),
            'pendidikan' => 'S1',
            'masa_kerja' => 4
        ]);
        KompetensiAuditor::create([
            'user_id' => 1,
            'pelatihan' => 'Advanced Traning Auditor',
            'tanggal_pelatihan' => date('2001-05-01'),
            'pendidikan' => 'S1',
            'masa_kerja' => 2
        ]);
        KompetensiAuditor::create([
            'user_id' => 1,
            'pelatihan' => 'Expert Traning Auditor',
            'tanggal_pelatihan' => date('2001-05-01'),
            'pendidikan' => 'S1',
            'masa_kerja' => 3
        ]);
        KompetensiAuditor::create([
            'user_id' => 2,
            'pelatihan' => 'Basic Traning Auditor',
            'tanggal_pelatihan' => date('2001-05-01'),
            'pendidikan' => 'S1',
            'masa_kerja' => 4
        ]);
        KompetensiAuditor::create([
            'user_id' => 2,
            'pelatihan' => 'Advanced Traning Auditor',
            'tanggal_pelatihan' => date('2001-05-01'),
            'pendidikan' => 'S1',
            'masa_kerja' => 4
        ]);
    }
}
