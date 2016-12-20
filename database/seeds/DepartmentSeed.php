<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['id' => 1,'name' => 'Main Dev']);
        Department::create(['id' => 2,'name' => 'Sideline Dev']);
    }
}
