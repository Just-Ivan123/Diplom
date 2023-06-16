<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Employee;
use App\Models\Candidate;
class LoginController extends Controller
{
    public function showLogin(){
        return view('auth/signin');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'HR') {
                // Действия для пользователя HR
                return redirect('/employees');
            } elseif ($user->role === 'Employee') {
                $employeeId = $user->employee->id; // Получаем ID работника
                return redirect()->route('employees.edit', ['employee' => $employeeId]);
            } elseif ($user->role === 'Candidate') {
                $candidateId = $user->candidate->id; // Получаем ID работника
                return redirect()->route('candidates.edit', ['candidate' => $candidateId]);
            }
        }

        return redirect()->route('login')->with('error', 'Неправильный email или пароль.');
    }
    public function showSignUp(){
        return view('auth/signup');
    }
        public function signUp(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:Candidate,HR,Employee', // Добавлено поле role с валидацией
        ]);

        // Создание нового пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role, // Добавлено поле role
        ]);

        if ($request->role === 'HR') {
            $hr = new Employee();
            $hr->name = $user->name;
            $hr->email = $user->email;
            $user->employee()->save($hr);
            Auth::attempt($request->only('email', 'password'));
            return redirect('/employees');
        } elseif ($request->role === 'Candidate') {
            $candidate = new Candidate();
            $candidate->name = $user->name;
            $candidate->email = $user->email;
            $user->candidate()->save($candidate);
            $candidateId = $candidate->id; // Получаем ID работника
            Auth::attempt($request->only('email', 'password'));
            return redirect()->route('candidates.edit', ['candidate' => $candidateId]);
        } elseif ($request->role === 'Employee') {
            $employee = new Employee();
            $employee->name = $user->name;
            $employee->email = $user->email;
            $user->employee()->save($employee);
            $employeeId = $employee->id; // Получаем ID работника
            Auth::attempt($request->only('email', 'password'));
                return redirect()->route('employees.edit', ['employee' => $employeeId]);
        }
        // Аутентификация нового пользователя
        Auth::attempt($request->only('email', 'password'));

        return redirect('/jobs'); // Редирект на нужную страницу
    }
    
        public function delete()
        {
            $user = Auth::user();
    
            // Удаление пользователя
            $user->delete();
    
            // Выход из системы
            Auth::logout();
    
            return redirect('/signin'); // Редирект на нужную страницу
        }
        public function signout()
    {
        Auth::logout();

        return redirect()->route('login'); // Редирект на нужную страницу после выхода
    }
}
