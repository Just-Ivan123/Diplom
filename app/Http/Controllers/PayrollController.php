<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;

class PayrollController extends Controller
{
        public function store(Request $request)
        {
            // Валидация данных запроса
            $validatedData = $request->validate([
                'employee_id' => 'required',
                'base_salary' => 'required',
                'overtime' => 'required',
                'bonuses' => 'required',
                'deductions' => 'required',
                'net_salary' => 'required',
            ]);
    
            // Создание новой записи о зарплате
            $payroll = new Payroll($validatedData);
            $payroll->employee_id = $request->employee_id;
            $payroll->save();
    
            return redirect()->route('employees.show', $payroll->employee_id)
                ->with('success', 'Payroll created successfully');
        }
}
