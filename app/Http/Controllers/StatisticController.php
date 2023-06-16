<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class StatisticController extends Controller
{
    public function statistics()
{
    // Получить 5 работ с наибольшим отношением places/candidates
    $topJobs = Job::withCount('candidates')
        ->orderByRaw('places / candidates_count DESC')
        ->take(5)
        ->get();

    // Получить 5 работ с наименьшим отношением places/candidates
    $bottomJobs = Job::withCount('candidates')
        ->orderByRaw('places / candidates_count ASC')
        ->take(5)
        ->get();

    return view('statistics', compact('topJobs', 'bottomJobs'));
}
}
