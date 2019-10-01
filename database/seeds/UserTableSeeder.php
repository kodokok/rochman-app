<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $pendidikan = ['SMA', 'STM', 'SMK', 'D3', 'D4', 'S1', 'S2', 'S3'];
        $roles = Role::all()->pluck('name');
        $admin = User::create([
            'nama' => 'Rochman Hidayat',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'alamat' => $faker->address,
            'phone' => '000-000-0000',
            'pendidikan' => 'S1',
            'tanggal_masuk' => Carbon::now()->subYears(10)->format('Y-m-d'),
        ]);
        $admin->assignRole(['admin']);

        for ($i=0; $i < 20; $i++) {
            $user = User::create([
                'nama' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => Hash::make('123456'),
                'alamat' => $faker->streetAddress,
                'phone' => $faker->phoneNumber,
                'pendidikan' => $faker->randomElement($pendidikan),
                'tanggal_masuk' => Carbon::now()->subYears($faker->numberBetween(1, 10))->format('Y-m-d'),
            ]);

            $user->assignRole($faker->randomElement($roles));
        }

    }
}
