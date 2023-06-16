<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $candidates = Candidate::orderBy('created_at', 'desc')->get();

        return view('candidates', compact('candidates'));
    }
    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidateWithJob = $candidate->load('job');

        return view('candidates-show', compact('candidateWithJob'));
    }

    public function create()
    {
        // Возвращаем представление для создания кандидата
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        // Валидация данных, полученных из формы
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'job_id' => 'required|exists:jobs,id',
            'experience' => 'required',
            'diploma' => 'required'
        ]);

        // Создаем нового кандидата
        Candidate::create($validatedData);

        // Перенаправляем пользователя на страницу со списком кандидатов
        return redirect()->route('candidates.index');
    }

    public function edit(Candidate $candidate)
    {
        // Возвращаем представление для редактирования кандидата
        return view('candidates-edit', ['candidate' => $candidate]);
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'resume_link' => 'nullable|url',
            'about' => 'nullable',
            'experience' => 'required',
            'diploma' => 'required'
        ]);

        $candidate->update($validatedData);

        return redirect()->route('candidates.show', $candidate->id)
            ->with('success', 'Candidate updated successfully');    }
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
