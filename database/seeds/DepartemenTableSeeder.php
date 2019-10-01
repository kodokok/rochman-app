<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Departemen;

class DepartemenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::findOrFail(1);
        $user6 = User::findOrFail(6);
        $user7 = User::findOrFail(7);
        $user8 = User::findOrFail(8);

        Departemen::create([
            'kode' => 'QA',
            'nama' => 'Quality Assurance',
            'lokasi' => 'Office QA Departement',
            'kadept_user_id' => $user1->id
        ]);
        Departemen::create([
            'kode' => 'DI',
            'nama' => 'Digital Infrastructure',
            'lokasi' => 'Office DI Departement',
            'kadept_user_id' => $user8->id
        ]);
        Departemen::create([
            'kode' => 'MS',
            'nama' => 'Management Service',
            'lokasi' => 'Office MS Departement R1',
            'kadept_user_id' => $user8->id
        ]);
        Departemen::create([
            'kode' => 'HRI',
            'nama' => 'Human Resource & Infrastructure',
            'lokasi' => 'Office MS Departement R2',
        ]);
        Departemen::create([
            'kode' => 'PS',
            'nama' => 'Production Support',
            'lokasi' => 'Office Factory Departement',
            'kadept_user_id' => $user6->id
        ]);
        Departemen::create([
            'kode' => 'FA',
            'nama' => 'Factory',
            'lokasi' => 'Office Factory Departement',
        ]);
        Departemen::create([
            'kode' => 'MK',
            'nama' => 'Marketing & Sales Support',
            'lokasi' => 'Office Marketing Departement',
            'kadept_user_id' => $user7->id
        ]);
        Departemen::create([
            'kode' => 'SA',
            'nama' => 'Sales',
            'lokasi' => 'Office Sales Departement',
        ]);
    }
}
