<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalaryRange>
 */
class SalaryRangeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lower_range' => $this->faker->numberBetween(18000, 44999),
            'upper_range' => $this->faker->numberBetween(45000, 100000),
        ];
    }
}
