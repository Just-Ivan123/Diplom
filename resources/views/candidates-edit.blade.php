@extends('layout/layout')

@section('content')
    <h1>Edit Candidate</h1>

    <form action="{{ route('candidates.update', $candidate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $candidate->name }}" required>
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $candidate->email }}" required>
        </div>
        <div class="form-group">
            <label for="title">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $candidate->phone }}" required>
        </div>
        <div class="form-group">
            <label for="title">Resume Link</label>
            <input type="text" name="resume_link" id="resume_link" class="form-control" value="{{ $candidate->resume_link }}" required>
        </div>
        <div class="form-group">
            <label for="description">About</label>
            <textarea name="about" id="about" class="form-control" required>{{ $candidate->about }}</textarea>
        </div>
        <div class="form-group">
    <label for="experience">Опыт работы</label>
    <select name="experience" id="experience" class="form-control" required>
        <option value="yes" {{ $candidate->experience === 'yes' ? 'selected' : '' }}>Да</option>
        <option value="no" {{ $candidate->experience === 'no' ? 'selected' : '' }}>Нет</option>
    </select>
</div>

<div class="form-group">
    <label for="diploma">Высшее образование</label>
    <select name="diploma" id="diploma" class="form-control" required>
        <option value="yes" {{ $candidate->diploma === 'yes' ? 'selected' : '' }}>Да</option>
        <option value="no" {{ $candidate->diploma === 'no' ? 'selected' : '' }}>Нет</option>
    </select>
</div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection