<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Departemen;
use Faker\Factory as Faker;

class DepartemenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $user = User::role(['kadept'])->get();
        $dept = [
            ['kode' => 'QA', 'nama' => 'Quality Assurance'],
            ['kode' => 'DI', 'nama' => 'Digital Infrastructure'],
            ['kode' => 'MS', 'nama' => 'Management Service'],
            ['kode' => 'HRI', 'nama' => 'Human Resource & Infrastructure'],
            ['kode' => 'MNS', 'nama' => 'Marketing & Sales Support'],
            ['kode' => 'SA', 'nama' => 'Sales'],
            ['kode' => 'FA', 'nama' => 'Factory'],
        ];

        for ($i=0; $i < count($dept); $i++) {
            Departemen::create([
                'kode' => $dept[$i]['kode'],
                'nama' => $dept[$i]['nama'],
                'kadept_user_id' => $user->random()->id,
                'lokasi' => $faker->city,
            ]);
        }
    }
}
