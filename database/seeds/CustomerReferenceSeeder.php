<?php

use Illuminate\Database\Seeder;

class CustomerReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CustomerReferenceSeeder::class, 10)->create();
    }
}
