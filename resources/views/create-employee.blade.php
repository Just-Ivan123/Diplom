@extends('layout/layout')

@section('content')

<h1>Добавить нового сотрудника</h1>

<form method="POST" action="/employees">
    @csrf

    <div class="form-group">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="position">Должность:</label>
        <input type="text" id="position" name="position" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

@endsection