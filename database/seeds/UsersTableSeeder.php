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
            'image' => null,
            'password' => Hash::make('admin')
        ]);

        $user = User::create([
            'email' => 'user@mail.com',
            'name' => 'user',
            'image' => null,
            'password' => Hash::make('user')
        ]);

        $admin->assignRole('admin');
        $user->assignRole('auditee');
    }
}
