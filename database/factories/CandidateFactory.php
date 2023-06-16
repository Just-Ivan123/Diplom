<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidate;
use App\Models\Job;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    protected $model = Candidate::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'phone' => $this->faker->phoneNumber,
        'resume_link' => $this->faker->url,
        'about' => $this->faker->paragraph,
        'experience' => $this->faker->randomElement(['yes', 'no']),
        'diploma' => $this->faker->randomElement(['yes', 'no'])
        ];
    }
}
