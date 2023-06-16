<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidate;
use App\Models\User;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['open', 'closed']),
            'places' => $this->faker->numberBetween(1, 10)
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Job $job) {
            for ($i = 0; $i < 10; $i++){
            $candidateUser = User::factory()->create(['role' => 'candidate']);
            Candidate::factory()->create(['user_id' => $candidateUser->id, 'job_id' => $job->id]);
            }
        });
    }
}
