<nav class="navbar">
    <a href="#home" class="navbar-logo">App<span>z</span></a>
    <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#project">Project</a>
        <a href="#contact">Contact</a>
    </div>
    <div class="navbar-extra">
        <div class="profile">
            @auth
                <a class="user">
                    <img src="{{ auth()->user()->photo ?? 'https://source.unsplash.com/50x50?person' }}" alt="">
                </a>
                <ul class="profile-link">
                    <li><a href="{{ url('profile') }}"><i class="bi bi-person-circle"></i> {{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li><a href="{{ url('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                    <li><a href="{{ url('logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            @else
                <a href="{{ url('login') }}" class="user"><i data-feather="user"></i></a>
            @endauth
        </div>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
</nav>
