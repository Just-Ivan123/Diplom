

@extends('layout/layout')

@section('content')
<div style="display: flex; flex-direction: row; justify-content: space-between;">
<h1>Детали сотрудника: {{ $employee->name }}</h1>
<a href="/employees/{{ $employee->id }}/edit">Редактировать</a>

</div>
<div style="display: flex; justify-content: space-between;">
<div>
<p>Email: {{ $employee->email }}</p>
<p>Должность: {{ $employee->position }}</p>
</div>
<form method="POST" action="/employees/{{ $employee->id }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить сотрудника</button>
</form>
</div>
<h1>Create Payroll</h1>

    <form action="{{ route('payroll.store')}}" method="POST">
        @csrf
        <div style="display: flex; flex-direction: row; align-items: center;">
            <label for="title">base_salary</label>
            <input type="text" name="base_salary" id="base_salary" class="form-control" required>
            <label for="description">overtime</label>
            <input type="text" name="overtime" id="overtime" class="form-control" required>
            <label for="description">bonuses</label>
            <input type="text" name="bonuses" id="bonuses" class="form-control" required>
            <label for="description">deductions</label>
            <input type="text" name="deductions" id="deductions" class="form-control" required>
            <label for="description">net_salary</label>
            <input type="text" name="net_salary" id="net_salary" class="form-control" required>
        <input type="hidden" name="employee_id" id="employee_id" class="form-control" value ='{{$employee->id}}'>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
<table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>base_salary</th>
                <th>overtime</th>
                <th>bonuses</th>
                <th>deductions</th>
                <th>net_salary</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee->payroll as $p)
                <tr>
                    <td>{{ $p->created_at }}</td>
                    <td>{{ $p->base_salary }}</td>
                    <td>{{ $p->overtime }}</td>
                    <td>{{ $p->bonuses }}</td>
                    <td>{{ $p->deductions }}</td>
                    <td>{{ $p->net_salary }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection