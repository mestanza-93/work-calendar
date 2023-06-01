<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    WorkCalendar
                </a>
            </div>
        </nav>
  
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>