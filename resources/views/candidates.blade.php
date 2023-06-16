@extends('layout/layout')

@section('content')
    <h1>Кандидаты</h1>


    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->email }}</td>
                    <td>{{ $candidate->phone }}</td>
                    @if($candidate->job)
                    <td><a href="{{ route('jobs.show', $candidate->job->id) }}">{{$candidate->job->title}} </a></td>
                    @endif
                    <td>
                    <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection