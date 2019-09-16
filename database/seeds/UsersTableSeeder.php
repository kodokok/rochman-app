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
            'email' => 'admin@admin.com',
            'name' => 'admin',
            'password' => bcrypt(123456)
        ]);

        $user = User::create([
            'email' => 'user@user.com',
            'name' => 'user',
            'password' => bcrypt(123456)
        ]);

        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
