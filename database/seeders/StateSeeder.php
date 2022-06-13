<?php

namespace Database\Seeders;

use App\Models\LGA;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(__DIR__ . '/nigerian-states.json');

        $states = json_decode($file, true);

        foreach ($states[0] as $state => $lgas) {
            $state = State::create([
                'name' => $state,
            ]);
            
            foreach ($lgas as $lga) {
                LGA::create([
                    'name' => $lga,
                    'state_id' => $state->id,
                ]);
            }
            // dd($state, $lgas);
        }
    }
}
