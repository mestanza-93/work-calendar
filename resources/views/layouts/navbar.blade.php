<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">{{ __('messages.companies.text') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuItems" aria-controls="menuItems" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuItems">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees') }}">{{ __('messages.employees.text') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('calendar') }}">{{ __('messages.calendar.text') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vacances') }}">{{ __('messages.vacances.text') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>