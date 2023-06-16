<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Auth;
Route::resource('employees', EmployeeController::class);
Route::resource('jobs', JobController::class);
Route::resource('candidates', CandidateController::class);
Route::resource('payroll', PayrollController::class);
Route::get('/employees-search', [EmployeeController::class, 'search'])->name('employees.search');
Route::get('/job/{jobId}/candidate/{candidateId}/attach', [JobController::class, 'attachCandidate'])->name('job.candidate.attach');
Route::get('/statistics', [StatisticController::class, 'statistics']);

Route::get('/signup', [LoginController::class, 'showSignUp']);
Route::post('/signup', [LoginController::class, 'signUp'])->name('signup');
Route::get('/login', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/signout', [LoginController::class, 'signout'])->name('signout');
