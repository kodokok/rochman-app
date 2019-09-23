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
        $admin = User::findOrFail(1);
        $auditor = User::findOrFail(2);

        KompetensiAuditor::create(['user_id' => $admin->id, 'pelatihan' => 'Basic Traning Auditor', 'tanggal_pelatihan' => date('1999-05-01'), 'pendidikan' => 'S1', 'masa_kerja' => 4 ]);
        KompetensiAuditor::create(['user_id' => $admin->id, 'pelatihan' => 'Advanced Traning Auditor', 'tanggal_pelatihan' => date('2001-05-01'), 'pendidikan' => 'S1', 'masa_kerja' => 4 ]);
        KompetensiAuditor::create(['user_id' => $admin->id, 'pelatihan' => 'Expert Traning Auditor', 'tanggal_pelatihan' => date('2001-05-01'), 'pendidikan' => 'S1', 'masa_kerja' => 4 ]);
        KompetensiAuditor::create(['user_id' => $auditor->id, 'pelatihan' => 'Basic Traning Auditor', 'tanggal_pelatihan' => date('2001-05-01'), 'pendidikan' => 'S1', 'masa_kerja' => 4 ]);
        KompetensiAuditor::create(['user_id' => $auditor->id, 'pelatihan' => 'Advanced Traning Auditor', 'tanggal_pelatihan' => date('2001-05-01'), 'pendidikan' => 'S1', 'masa_kerja' => 4 ]);
    }
}
