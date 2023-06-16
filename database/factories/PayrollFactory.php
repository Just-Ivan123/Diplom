<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payroll>
 */
class PayrollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'base_salary' => $this->faker->numberBetween(2000, 5000),
        'overtime' => $this->faker->numberBetween(0, 500),
        'bonuses' => $this->faker->numberBetween(0, 1000),
        'deductions' => $this->faker->numberBetween(0, 1000),
        'net_salary' => $this->faker->numberBetween(1500, 4000),
        ];
    }
}
