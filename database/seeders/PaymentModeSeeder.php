<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentModes = ['Transfer', 'Teller'];

        foreach ($paymentModes as $paymentMode) {
            \App\Models\PaymentMode::create([
                'name' => $paymentMode,
            ]);
        }
    }
}
