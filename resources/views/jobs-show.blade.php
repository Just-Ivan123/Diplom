@extends('layout/layout')

@section('content')
<h1>Job Details</h1>

<div>
    <strong>Title:</strong> {{ $job->title }}
</div>
<div>
    <strong>Description:</strong> {{ $job->description }}
</div>
<div>
    <strong>Дата создания</strong> {{ $job->created_at }}
</div>
<div>
    <strong>Status:</strong> {{ $job->status }}
</div>
@if (Auth::user()->role === 'HR')
<a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-secondary">Edit</a>

<form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
<h2>Candidates:</h2>
<table class="table">
<thead>
            <tr>
                <th>Имя</th>
                <th>Почта</th>
                <th>Телефон</th>
                <th>Опыт Работы</th>
                <th>Образование</th>
                <th>Просмотр</th>
            </tr>
        </thead>
<tbody>
            @foreach($candidates as $candidate)
                <tr @if($candidate->diploma === 'yes' && $candidate->experience === 'yes') style="background-color: #aaf2c1" @endif
                @if($candidate->diploma === 'no' && $candidate->experience === 'no') style="background-color: #ffcccc" @endif>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->email }}</td>
                    <td>{{ $candidate->phone }}</td>
                    <td>@if( $candidate->experience === 'yes')
                        ✓
                    @endif
                </td>
                <td>@if( $candidate->diploma === 'yes')
                        ✓
                    @endif
                </td>
                    <td>
                        <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
@endif
@if (Auth::user()->role === 'Candidate')
@if ($job->candidates->contains(Auth::user()->candidate)) 
<p>Вы уже откликнулись на эту вакансию</p>
@else
<a href="{{ route('job.candidate.attach', [$job->id, Auth::user()->candidate->id])}}" class="btn btn-secondary">Откликнуться</a>
@endif
@endif
@endsection