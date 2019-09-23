<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'password' => bcrypt('password')
        ]);

        $user = User::create([
            'email' => 'user@mail.com',
            'name' => 'user',
            'image' => null,
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('admin');
        $user->assignRole('auditee');
    }
}
