<?php

use Illuminate\Database\Seeder;

class JobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\JobTitle::create(['title' => 'Ka. Dept']);
        \App\JobTitle::create(['title' => 'Ka. Div']);
        \App\JobTitle::create(['title' => 'Direksi']);
    }
}
