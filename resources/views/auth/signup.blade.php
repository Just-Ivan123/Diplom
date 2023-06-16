@extends('layout/layout')
@section('content')

<form action="{{ route('signup') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control">
            <option value="HR">HR</option>
            <option value="Employee">Employee</option>
            <option value="Candidate">Candidate</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection