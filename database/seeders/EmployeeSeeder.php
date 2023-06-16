<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Запустите сидер базы данных.
     *
     * @return void
     */
    public function run()
    {
        // Создает 50 сотрудников и сохраняет их в базе данных.
        Employee::factory()->count(50)->create();
    }
}
