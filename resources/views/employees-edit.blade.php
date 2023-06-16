@extends('layout/layout')

@section('content')

<h1>Редактировать сотрудника</h1>

<form method="POST" action="/employees/{{ $employee->id }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $employee->name }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ $employee->email }}" required>
    </div>

    <div class="form-group">
        <label for="position">Должность:</label>
        <input type="text" id="position" name="position" class="form-control" value="{{ $employee->position }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Обновить</button>
</form>

@endsection