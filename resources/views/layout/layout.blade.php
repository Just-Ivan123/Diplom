
@include('layout/heading')
@include('layout/session')
@include('layout/errors')

<body>
    @include('layout/navigation')
    <div class="container mt-4">
        <!-- Здесь будет контент отдельных страниц -->
        @yield('content')
    </div>

    <!-- Здесь можно добавить скрипты, например, JavaScript или jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>