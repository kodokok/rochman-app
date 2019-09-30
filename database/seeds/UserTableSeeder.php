<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nama' => 'Rochman Hidayat',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'alamat' => 'Jl. Danau Toba No.235, Tangerang Curug',
            'phone' => '777-777-7777',
            'pendidikan' => 'S1',
            'tanggal_masuk' => Carbon::now()->subYears(10)->format('Y-m-d'),
        ]);
        $admin->assignRole(['admin']);

        $auditee = User::create([
            'nama' => 'Samsul Abidin',
            'email' => 'samsul.abidin@hotmail.com',
            'password' => Hash::make(123456),
            'alamat' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum, veritatis.',
            'phone' => '001-0002-000',
            'pendidikan' => 'SMA',
            'tanggal_masuk' => Carbon::now()->subYears(3)->format('Y-m-d'),
        ]);
        $auditee->assignRole(['auditee']);

        $auditee2 = User::create([
            'nama' => 'Susi Andrea Laraswati',
            'email' => 'susi.andres@gmail.com',
            'password' => Hash::make(123456),
            'alamat' => 'Lorem ipsum dolor sit amet. Lorem, ipsum dolor.',
            'phone' => '001-0302-001',
            'pendidikan' => 'SMK',
            'tanggal_masuk' => Carbon::now()->subYears(3)->format('Y-m-d'),
        ]);
        $auditee2->assignRole(['auditee']);

        $auditor = User::create([
            'nama' => 'Jaka Tingkir',
            'email' => 'jaka.tingkir@gmail.com',
            'password' => Hash::make(123456),
            'alamat' => 'Lorem ipsum dolor sit amet 213',
            'phone' => '111-1111-1111',
            'pendidikan' => 'D3',
            'tanggal_masuk' => Carbon::now()->subYears(3)->format('Y-m-d'),
        ]);
        $auditor->assignRole(['auditor']);

        $auditor2 = User::create([
            'nama' => 'Tri Sakti Pratiwi',
            'email' => 'sri.sakti@hotmail.com',
            'password' => Hash::make(123456),
            'alamat' => 'Lorem ipsum dolor sit amet. L223.',
            'phone' => '333-222-1111',
            'pendidikan' => 'D4',
            'tanggal_masuk' => Carbon::now()->subYears(6)->format('Y-m-d'),
        ]);
        $auditor2->assignRole(['auditor']);

        $auditor_lead = User::create([
            'nama' => 'Jagat Purwo Abadi',
            'email' => 'jagat.abadi@email.com',
            'password' => Hash::make(123456),
            'alamat' => 'Lorem ipsum dolor sit amet. Lorem, ipsum dolor. c213',
            'phone' => '444-222-1133',
            'pendidikan' => 'S1',
            'tanggal_masuk' => Carbon::now()->subYears(9)->format('Y-m-d'),
        ]);
        $auditor_lead->assignRole(['auditor_lead', 'kadiv']);

        $auditor_lead2 = User::create([
            'nama' => 'Muhammad Raja Jaya',
            'email' => 'muhammad.raja@gmail.com',
            'password' => Hash::make(123456),
            'alamat' => 'Lorem ipsum dolor sit amet. Lorem, ipsum dolor. x512',
            'phone' => '333-222-1111',
            'pendidikan' => 'S1',
            'tanggal_masuk' => Carbon::now()->subYears(12)->format('Y-m-d'),
        ]);
        $auditor_lead2->assignRole(['auditor_lead', 'kadept']);

        $auditor_lead3 = User::create([
            'nama' => 'Joko Susilo',
            'email' => 'joko.susilo@gmail.com',
            'password' => Hash::make(123456),
            'alamat' => 'Lorem ipsum dolor sit amet. Lorem, ipsum dolor. x22',
            'phone' => '999-999-9999',
            'pendidikan' => 'S2',
            'tanggal_masuk' => Carbon::now()->subYears(12)->format('Y-m-d'),
        ]);
        $auditor_lead3->assignRole(['auditor_lead', 'direksi']);
    }
}
