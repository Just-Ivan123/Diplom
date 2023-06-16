@extends('layout/layout')

@section('content')
    <h1>Jobs</h1>
    @auth
    @if (Auth::user()->role === 'HR')
    <a href="{{ route('jobs.create') }}" class="btn btn-primary">Create Job</a>
    @endif
    @endauth
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                @auth
                @if (Auth::user()->role === 'HR')
                <th>Мест</th>
                @endif
                @endauth
                <th>Откликов</th>
                @auth
                <th>Actions</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->description }}</td>
                    <td>{{ $job->status }}</td>
                    <td>{{ $job->places }}</td>
                    <td>{{ $job->candidates()->count() }}</td>
                    <td>
                    @auth
                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">View</a>
                        @if (Auth::user()->role === 'HR')
                        <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @endif
                            @endauth
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection