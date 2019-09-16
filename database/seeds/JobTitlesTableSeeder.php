<?php

use Illuminate\Database\Seeder;
use App\JobTitle;

class JobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobTitle::create(
            ['title' => 'Ka. Dept'],
            ['title' => 'Ka. Div'],
            ['title' => 'Direksi']
        );
    }
}
