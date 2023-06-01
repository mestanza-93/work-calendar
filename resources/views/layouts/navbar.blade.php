<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">{{ $navbar['title'] }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuItems" aria-controls="menuItems" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuItems">
            <ul class="navbar-nav">
                @foreach ($navbar['sections'] as $navbarItem)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($navbarItem['route']) }}">{{ $navbarItem['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>