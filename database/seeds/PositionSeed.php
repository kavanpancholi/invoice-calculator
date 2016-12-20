<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create(['id' => 1,'name' => 'Frontend Developer']);
        Position::create(['id' => 2,'name' => 'Backend Developer']);
    }
}
