<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
 
      
    protected $model = Employee::class;

    
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'position' => $this->faker->jobTitle,
        ];
    }
     public function configure()
    {
        return $this->afterCreating(function (Employee $employee) {
            Payroll::factory()->count(10)->create([
                'employee_id' => $employee->id,
            ]);
        });
    }
}
