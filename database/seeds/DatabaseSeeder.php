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
        $this->call(AdminSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EventTypeSeeder::class);
        $this->call(WaiterSeeder::class);
    }
}
