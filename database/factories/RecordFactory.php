<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $principals = \App\Models\Principal::all()->pluck('id');
        $paymentModes = \App\Models\PaymentMode::all()->pluck('id');
        $unitPrices = \App\Models\UnitPrice::all()->pluck('id');
        $quarters = \App\Models\Quarter::all()->pluck('id');
        $types = \App\Models\Type::all()->pluck('id');
        $lgas = \App\Models\LGA::all()->pluck('id');

        return [
            'principal_id' => $this->faker->randomElement($principals),
            'start' => rand(1000, 9999),
            'to' => rand(1000, 9999),
            'no_of_pillars' => rand(1, 200),
            'plan_no' => rand(1000, 9999),
            'location' => $this->faker->address,
            'lga_id' => $this->faker->randomElement($lgas),
            'unit_price_id' => $this->faker->randomElement($unitPrices),
            'payment_mode_id' => $this->faker->randomElement($paymentModes),
            'quarter_id' => $this->faker->randomElement($quarters),
            'type_id' => $this->faker->randomElement($types),
        ];
    }
}
