<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'email' => 'admin@mail.com',
            'name' => 'Rochman Hidayat',
            'address' => 'Jl. Danau Toba No.235, Tangerang Curug',
            'phone' => 'Phone 1',
            'password' => Hash::make('admin')
        ]);

        $auditor = User::create([
            'email' => 'auditor@mail.com',
            'name' => 'Jaja Miharja',
            'address' => 'Jl. Asean Pasific 190, Tangerang Cikupa',
            'phone' => '777-000-1111',
            'password' => Hash::make('auditor')
        ]);

        $auditee = User::create([
            'email' => 'auditee@mail.com',
            'name' => 'Andre Taulani',
            'address' => 'Jl. Pegunungan Himalaya 15, Jakarta Timur',
            'phone' => '888-8888-22',
            'password' => Hash::make('auditee')
        ]);

        $auditor_leader = User::create([
            'email' => 'auditor_leader@mail.com',
            'name' => 'Bobi Cool',
            'address' => 'Jl. Bengawan Solo nomor 5',
            'phone' => '8428-8818-22',
            'password' => Hash::make('lead')
        ]);

        $admin->assignRole(['admin','auditor']);
        $auditor->assignRole('auditor');
        $auditee->assignRole('auditee');
        $auditor_leader->assignRole('auditor_leader');
    }
}
