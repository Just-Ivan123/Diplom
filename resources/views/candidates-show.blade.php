@extends('layout/layout')

@section('content')
<h1>Кандидат {{ $candidateWithJob->name }}</h1>


<div>
    <strong>Email: </strong> {{ $candidateWithJob->email }}
</div>
<div>
    <strong>Phone:</strong> {{ $candidateWithJob->phone }}</p>
</div>
<div>
    <strong>Resume Link:</strong> {{ $candidateWithJob->resume_link }}</p>
</div>
<div>
    <strong>About:</strong> {{ $candidateWithJob->about }}</p>
</div>
<div>
    <strong>Опыт работы:</strong> {{ $candidateWithJob->experience }}</p>
</div>
<div>
    <strong>Высшее образование:</strong> {{ $candidateWithJob->diploma }}</p>
</div>
<a href="{{ route('candidates.edit', $candidateWithJob->id) }}" class="btn btn-secondary">Edit</a>

<form action="{{ route('candidates.destroy', $candidateWithJob->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
@endsection