<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Candidate;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get();
        return view('jobs', compact('jobs'));
    }

  
    public function create()
    {
        return view('jobs-create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Job::create($request->all());
        return redirect()->route('jobs.index');
    }

   
    public function show(Job $job)
    {
        $candidates = $job->candidates()->orderBy('diploma', 'asc')
        ->orderBy('experience', 'asc')
        ->get();

    return view('jobs-show', compact('job', 'candidates'));
    }

    
    public function edit(Job $job)
    {
        return view('jobs-edit', compact('job'));
    }

    
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $job->update($request->all());
        return redirect()->route('jobs.index');
    }

   
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
    public function attachCandidate($jobId, $candidateId)
{
    $job = Job::findOrFail($jobId); // Получаем экземпляр работы по идентификатору
    $candidate = Candidate::findOrFail($candidateId); // Получаем экземпляр кандидата по идентификатору

    // Привязываем кандидата к работе
    $candidate->job_id = $job->id;
    $candidate->save();
    // Другие действия, если необходимо

    return redirect()->back()->with('success', 'Кандидат успешно привязан к работе.');
}
}