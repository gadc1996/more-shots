<?php

use Illuminate\Database\Seeder;

class ShotSeeder extends Seeder
{
    public function run()
    {
        factory(ShotSeeder::class, 20)->create();
    }
}
