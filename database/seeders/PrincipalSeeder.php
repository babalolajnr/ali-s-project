<?php

namespace Database\Seeders;

use App\Models\Principal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrincipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Principal::factory()->times(100)->create();
    }
}
