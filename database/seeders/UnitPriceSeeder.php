<?php

namespace Database\Seeders;

use App\Models\UnitPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitPrice::create([
            'price' => 900,
        ]);
    }
}
