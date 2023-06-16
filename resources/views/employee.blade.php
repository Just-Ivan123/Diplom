@extends('layout/layout')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between;">
    <h2>Сотрудники</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Добавить сотрудника</a>
    </div>
    <hr>
    <form action="{{ route('employees.search') }}" method="GET">
    <div class="form-group" style="display: flex; flex-direction: row; align-items: center;">
        <input type="text" name="search" id="search" class="form-control" placeholder="Введите имя, должность или почту">
    <button type="submit" class="btn btn-primary">Поиск</button>
    </div>
</form>
    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Должность</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a></td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->position }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-default">Редактировать</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection