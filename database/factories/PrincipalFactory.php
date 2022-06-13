<?php

namespace Database\Factories;

use Database\Seeders\StatusSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Artisan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Principal>
 */
class PrincipalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $statuses = \App\Models\Status::all()->pluck('id')->toArray();
        if (empty($statuses)) {
            Artisan::call('db:seed', ['--class' => StatusSeeder::class]);
        }
        return [
            'name' => $this->faker->name,
            'surcon_number' => $this->faker->unique()->numberBetween(100000, 999999),
            'status_id' => $this->faker->randomElement($statuses),
        ];
    }
}
