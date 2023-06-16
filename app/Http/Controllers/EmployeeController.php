<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\PayrollController;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employee', compact('employees'));
    }

    public function create()
    {
        return view('create-employee');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'position' => 'required',
            // Добавьте дополнительные поля согласно вашим потребностям
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
                        ->with('success','Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $employee = Employee::with('payroll')->find($employee->id);
        return view('employees-show',compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees-edit',compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'position' => 'required',
            // Добавьте дополнительные поля согласно вашим потребностям
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
                        ->with('success','Employee deleted successfully');
    }
    public function search(Request $request)
{
    $search = $request->input('search');

    $employees = Employee::query()
        ->where(function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('position', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
        ->get();

    return view('employee', compact('employees'));
}
}