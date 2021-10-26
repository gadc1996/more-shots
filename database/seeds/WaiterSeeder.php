<?php

use Illuminate\Database\Seeder;

class WaiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Waiter::class, 20)->create();
    }
}
