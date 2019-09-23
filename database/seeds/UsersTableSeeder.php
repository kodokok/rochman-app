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
            'name' => 'admin',
            'password' => Hash::make('admin')
        ]);

        $auditor = User::create([
            'email' => 'auditor@mail.com',
            'name' => 'auditor',
            'password' => Hash::make('auditor')
        ]);

        $auditee = User::create([
            'email' => 'auditee@mail.com',
            'name' => 'auditee',
            'password' => Hash::make('auditee')
        ]);

        $auditor_leader = User::create([
            'email' => 'auditor_leader@mail.com',
            'name' => 'user',
            'password' => Hash::make('lead')
        ]);

        $admin->assignRole('admin');
        $auditor->assignRole('auditor');
        $auditee->assignRole('auditee');
        $auditor_leader->assignRole('auditor_leader');
    }
}
