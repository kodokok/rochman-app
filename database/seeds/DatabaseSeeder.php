<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(DepartemenTableSeeder::class);
        $this->call(KlausulTableSeeder::class);
        $this->call(KompetensiAuditorTableSeeder::class);
        // $this->call(AuditPlanTableSeeder::class);
        // $this->call(TemuanAuditTableSeeder::class);
    }
}
