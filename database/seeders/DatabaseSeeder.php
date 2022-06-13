<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(StatusSeeder::class);
        $this->call(QuarterSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(UnitPriceSeeder::class);
        $this->call(PaymentModeSeeder::class);
    }
}
