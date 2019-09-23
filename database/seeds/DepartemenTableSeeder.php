<?php

use App\Departemen;
use App\User;
use Illuminate\Database\Seeder;

class DepartemenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->string('nama');
        // $table->string('lokasi');
        // $table->unsignedBigInteger('kadept');
        $user = User::findOrFail(1);
        $user2 = User::findOrFail(2);

        Departemen::create([
            ['name' => 'QA', 'lokasi' => 'office', 'kadept' => $user->id],
            ['name' => 'IT', 'lokasi' => 'office', 'kadept' => $user->id],
            ['name' => 'MS', 'lokasi' => 'office', 'kadept' => $user2->id],
            ['name' => 'HR', 'lokasi' => 'office', 'kadept' => $user2->id],
            ['name' => 'PRODUCTION', 'lokasi' => 'office', 'kadept' => $user2->id],
        ]);
    }
}
