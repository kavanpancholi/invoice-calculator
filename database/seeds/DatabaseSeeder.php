<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeed::class);
        $this->call(PositionSeed::class);
        $this->call(DepartmentSeed::class);
        $this->call(UserSeed::class);
    }
}
