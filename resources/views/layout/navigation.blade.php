@php
    use Illuminate\Support\Facades\Auth;
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light">
@auth
    @if (Auth::user()->role === 'HR')
    <a class="navbar-brand" href="/employees">Отдел Кадров</a>
    <a class="navbar-brand" href="/jobs">Вакансии</a>
    <a class="navbar-brand" href="/candidates">Кандидаты</a>
    <a class="navbar-brand" href="/statistics">Статистика</a>
    <a class="navbar-brand" href="/signout">Sign Out</a>

    @elseif (Auth::user()->role === 'Employee')
    <a class="navbar-brand" href="/jobs">Вакансии</a>
    <a class="navbar-brand" href="/signout">Sign Out</a>
    @elseif (Auth::user()->role === 'Candidate')
    <a class="navbar-brand" href="/jobs">Вакансии</a>
    <a class="navbar-brand" href="/signout">Sign Out</a>
    @endif
    @endauth
    @if (!auth()->check())
    <a class="navbar-brand" href="/jobs">Вакансии</a>
    <a class="navbar-brand" href="/login">Login</a>
    <a class="navbar-brand" href="/signup">Sign Up</a>
    @endif
        
        <!-- Вставьте здесь код навигации, если он есть -->
    </nav>
