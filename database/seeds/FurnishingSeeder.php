<?php

use Illuminate\Database\Seeder;

class FurnishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Furnishing::class, 15)->create();
    }
}
